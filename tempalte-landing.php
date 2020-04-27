<?php /* Template Name: Game Page Landing */ get_header(); ?>

	<main role="main" class="main-landing">
		<!-- section -->
		<section>
            <?php $query = new WP_Query(['posts_per_page' => -1, 'post_type' => 'game']); while ( $query->have_posts() ) : $query->the_post(); ?>
            <article id="post-<?php the_ID();?>" <?php post_class('game-post');?>>

                <div class="d-flex container">

                    <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
                    <div class="game-post__thumbnail row">
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
                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
                        </div>
                    </div>
                </div>

            </article>

            <?php endwhile; wp_reset_query(); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
