<?php

function ajax_filter_posts_scripts()
{
    // Enqueue script
    wp_register_script(
        'afp_script',
        get_template_directory_uri() . '/js/ajax-filter-posts.js',
        false,
        null,
        false
    );
    wp_enqueue_script('afp_script');

    wp_localize_script('afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce('afp_nonce'), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

// Script for getting posts
function ajax_filter_get_posts($taxonomy)
{
    // Verify nonce
    if (
        !isset($_POST['afp_nonce']) ||
        !wp_verify_nonce($_POST['afp_nonce'], 'afp_nonce')
    ) {
        die('Permission denied');
    }

    $taxonomy = json_decode(stripslashes($_POST['taxonomy']));
    $isBox = (bool) $_POST['isBox'];
    $isDigital = (bool) $_POST['isDigital'];

    // WP Query
    if ($isBox) {
        $args = array(
            'post_type' => 'game_box',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'game_box_tag',
                    'field' => 'slug',
                    'terms' => $taxonomy
                )
            )
        );
    } else {
        $args = array(
            'post_type' => 'game',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'game_tag',
                    'field' => 'slug',
                    'terms' => $taxonomy
                )
            )
        );
    }
    if ($isDigital) {
        $args = array(
            'tag' => implode(',', $taxonomy),
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
                    'field' => 'slug',
                    'terms' => 'digitale-toets' // Your category slug (I have a category 'interior')
                )
            )
        );
    }

    // If taxonomy is not set, remove key from array and get all posts
    if (!$taxonomy) {
        if ($isDigital) {
            unset($args['tag']);
        } else {
            unset($args['tax_query']);
        }
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()):

            $query->the_post();

            if ($isBox) {
                include get_stylesheet_directory() .
                    '/inc/article-game-box.php';
            } elseif ($isDigital) {
                include get_stylesheet_directory() . '/inc/article-digital.php';
            } else {
                include get_stylesheet_directory() . '/inc/article-game.php';
            }
            ?>

  <?php
        endwhile; ?>
    <script>feather.replace();</script>
  <?php
    else:
         ?>
    <h2>No posts found</h2>
  <?php
    endif;

    die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');

function ajax_search_posts_scripts()
{
    // Enqueue script
    wp_register_script(
        'asp_script',
        get_template_directory_uri() . '/js/ajax-search-posts.js',
        false,
        null,
        false
    );
    wp_enqueue_script('asp_script');

    wp_localize_script('asp_script', 'asp_vars', array(
        'asp_nonce' => wp_create_nonce('asp_nonce'), // Create nonce which we later will use to verify AJAX request
        'asp_ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'ajax_search_posts_scripts', 100);

// Script for getting posts
function ajax_search_get_escgames($search)
{
    // Verify nonce
    if (
        !isset($_GET['asp_nonce']) ||
        !wp_verify_nonce($_GET['asp_nonce'], 'asp_nonce')
    ) {
        die('Permission denied');
    }

    $search = $_GET['search'];

    // WP Query
    $args = array(
        's' => esc_attr($search),
        'post_type' => 'post',
        'category_name' => 'digitale-toets',
        'posts_per_page' => -1
    );

    // If taxonomy is not set, remove key from array and get all posts
    if (!$search) {
        unset($args['s']);
    }

    $query = new WP_Query($args);

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="game-post">

        <div class="d-flex row">

            <?php if (has_post_thumbnail()):// Check if thumbnail exists
                 ?>
                <div class="game-post__thumbnail col-md-4">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(array(380, 250));
                // Declare pixel size you need inside the array
                ?>
                    </a>
                </div>
            <?php endif; ?>

            <div class="post__content col-md-8">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                </h2>
                <!-- /post title -->

                <div>
                    <?php html5wp_excerpt('html5wp_overview');
            // Build your custom callback length in functions.php
            ?>
                </div>
            </div>
        </div>

    </article>
  <?php
        endwhile; ?>
  <?php
    else:
         ?>
    <h2>No posts found</h2>
  <?php
    endif;

    die();
}

add_action('wp_ajax_search_posts', 'ajax_search_get_escgames');
add_action('wp_ajax_nopriv_search_posts', 'ajax_search_get_escgames');
