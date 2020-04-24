<?php get_header(); ?>

	<main role="main" class="test">

	<?php if (have_posts()): while (have_posts()): the_post();?>

    <?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>

    <!-- article -->
    <article id="post-<?php the_ID();?>" <?php post_class();?>>

        <div class="">

            <!-- post thumbnail -->
            <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
                <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                    <?php the_post_thumbnail(array(380, 250)); // Declare pixel size you need inside the array ?>
                </a>
            <?php endif;?>
            <!-- /post thumbnail -->

            <div class="post__content">
                <!-- post title -->
                <h2>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                </h2>
                <!-- /post title -->

                <div>
                <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
                </div>
            </div>
        </div>

        <?php edit_post_link();?>

    </article>
    <!-- /article -->

<?php endwhile;?>

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e('Sorry, nothing to display.', 'gameexp');?></h2>
    </article>
    <!-- /article -->

<?php endif;?>

	</main>

<?php get_footer(); ?>
