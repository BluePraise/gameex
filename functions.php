<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: gameexp.com | @gameexp
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'            => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'        => '000',
    'width'                => 1000,
    'height'            => 198,
    'random-default'        => false,
    'wp-head-callback'        => $wphead_cb,
    'admin-head-callback'        => $adminhead_cb,
    'admin-preview-callback'    => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('gameexp', get_template_directory() . '/languages');
}

/*------------------------------------*\
Functions
\*------------------------------------*/

// HTML5 Blank navigation
function gameexp_nav()
{
    wp_nav_menu(
        array(
            'theme_location' => 'header-menu',
            'menu' => '',
            'container' => 'div',
            'container_class' => 'menu-{menu slug}-container',
            'container_id' => '',
            'menu_class' => 'menu navbar-nav',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul>%3$s</ul>',
            'depth' => 0,
            'walker' => '',
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function gameexp_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('gameexpscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('gameexpscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function gameexp_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('font', get_template_directory_uri() . '/css/font.css', array(), '1.0', 'all');
    wp_enqueue_style('font'); // Enqueue it!

    wp_register_style('gameexp', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('gameexp'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'gameexp'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'gameexp'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'gameexp'), // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    $args['after'] = '<span class="icon"></span>';
    $args['items_wrap'] = '<ul class="primary-menu navbar-nav navbar-expand-lg navbar-light">%3$s</ul>';
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {
    // Define Footer Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'gameexp'),
        'description' => __('Description for this widget-area...', 'gameexp'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Define Footer Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'gameexp'),
        'description' => __('Description for this widget-area...', 'gameexp'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Define Footer Widget Area 3
    register_sidebar(array(
        'name' => __('Widget Area 3', 'gameexp'),
        'description' => __('Description for this widget-area...', 'gameexp'),
        'id' => 'widget-area-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Define Footer Widget Area 4
    register_sidebar(array(
        'name' => __('Widget Area 4', 'gameexp'),
        'description' => __('Description for this widget-area...', 'gameexp'),
        'id' => 'widget-area-4',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 70;
}

function html5wp_overview($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}


// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}


function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, false);
  wp_enqueue_script('afp_script');

  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);

// Script for getting posts
function ajax_filter_get_posts( $taxonomy ) {

  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');

  $taxonomy = $_POST['taxonomy'];

  // WP Query
  $args = array(
    'tag' => $taxonomy,
    'post_type' => 'game',
    'posts_per_page' => -1
  );

  // If taxonomy is not set, remove key from array and get all posts
  if( !$taxonomy ) {
    unset( $args['tag'] );
  }

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <article id="post-<?php the_ID();?>" class="game-post">

        <div class="d-flex fx-dir-col">

            <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
                <div class="game-post__thumbnail">
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                        <?php the_post_thumbnail(array(380, 250)); // Declare pixel size you need inside the array ?>
                    </a>
                </div>
            <?php endif;?>

            <div class="post__content">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                </h2>
                <!-- /post title -->

                <div>
                    <?php html5wp_excerpt('html5wp_overview'); // Build your custom callback length in functions.php ?>
                </div>
            </div>
        </div>

    </article>
  <?php endwhile; ?>
  <?php else: ?>
    <h2>No posts found</h2>
  <?php endif;

  die();
}

add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');


function ajax_search_posts_scripts() {
  // Enqueue script
  wp_register_script('asp_script', get_template_directory_uri() . '/js/ajax-search-posts.js', false, null, false);
  wp_enqueue_script('asp_script');

  wp_localize_script( 'asp_script', 'asp_vars', array(
        'asp_nonce' => wp_create_nonce( 'asp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'asp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_search_posts_scripts', 100);



// Script for getting posts
function ajax_search_get_posts( $search ) {

  // Verify nonce
  if( !isset( $_GET['asp_nonce'] ) || !wp_verify_nonce( $_GET['asp_nonce'], 'asp_nonce' ) )
    die('Permission denied');

  $search = $_GET['search'];

  // WP Query
  $args = array(
    's' => esc_attr( $search ),
    'post_type' => 'game',
    'posts_per_page' => -1
  );

  // If taxonomy is not set, remove key from array and get all posts
  if( !$search) {
    unset( $args['s'] );
  }

  $query = new WP_Query( $args );

  if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

    <article id="post-<?php the_ID();?>" class="game-post">

        <div class="d-flex fx-dir-col">

            <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
                <div class="game-post__thumbnail">
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                        <?php the_post_thumbnail(array(380, 250)); // Declare pixel size you need inside the array ?>
                    </a>
                </div>
            <?php endif;?>

            <div class="post__content">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                </h2>
                <!-- /post title -->

                <div>
                    <?php html5wp_excerpt('html5wp_overview'); // Build your custom callback length in functions.php ?>
                </div>
            </div>
        </div>

    </article>
  <?php endwhile; ?>
  <?php else: ?>
    <h2>No posts found</h2>
  <?php endif;

  die();
}

add_action('wp_ajax_search_posts', 'ajax_search_get_posts');
add_action('wp_ajax_nopriv_search_posts', 'ajax_search_get_posts');



/*------------------------------------*\
Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'gameexp_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_enqueue_scripts', 'gameexp_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'gameexpgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
    add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>


