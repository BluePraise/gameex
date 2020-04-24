<?php /* Template Name: Digitale Escape Games */ get_header(); ?>

	<main role="main" class="main-overview main-landing container">
        <?php get_sidebar('escape') ?>
		<!-- section -->
		<section class="main-overview__content">

            <form class="main-overview__search js-search-overview form-group" method="get" action="<?php echo home_url(); ?>" role="search">
                <input class="search-input form-control" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'gameexp' ); ?>">
                <button class="search-submit btn btn-primary" type="submit">Zoek</button>
            </form>
            <div class="main-overview__posts">

            <?php $query = new WP_Query([
                'posts_per_page' => -1,
                'post_type' => 'game',
                'category_name'  => 'escape-games'
            ]);
                while ( $query->have_posts() ) : $query->the_post(); ?>

            <article id="post-<?php the_ID();?>" <?php post_class('game-post container');?>>

                <div class="d-flex row">

                    <?php if (has_post_thumbnail()): // Check if thumbnail exists ?>
                    <div class="game-post__thumbnail col-md-4">
                        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                            <?php the_post_thumbnail(array(380, 250)); // Declare pixel size you need inside the array ?>
                        </a>
                    </div>
                    <?php endif;?>

                    <div class="post__content col-md-8">
                        <!-- post title -->
                        <h2>
                            <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
                        </h2>

                        <!-- /post title -->

                        <div class="single-fields">
                            <div>
                                <span><?php the_tags('<strong>Categorie: </strong>', ', ', ''); ?></span>
                            </div>

                            <div>
                                <strong>Doel:</strong> <span><?php the_field('the_target'); ?></span>
                            </div>
                            <div>
                                <?php if (get_field('age')): ?>
                                <strong>Jaar:</strong> <span> <?php the_field('age') ?> </span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if (get_field('time')): ?>
                                <strong>Tijd:</strong> <span> <?php the_field('time') ?> </span>
                                <?php endif; ?>
                            </div>

                            <div>
                                <?php html5wp_excerpt('html5wp_overview'); // Build your custom callback length in functions.php ?>
                            </div>

                            <a href="<?php the_permalink();?>" class="btn btn-primary">Bekijk spel</a>
                        </div>

                    </div>
                </div>

            </article>

            <?php endwhile; wp_reset_query(); ?>
        </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer('small'); ?>
