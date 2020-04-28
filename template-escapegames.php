<?php /* Template Name: Digitale Escape Games */ get_header(); ?>

	<main role="main" class="main-overview main-landing container">
        <?php get_sidebar('escape') ?>
		<!-- section -->
		<section class="main-overview__content js-loading-container">

            <form class="main-overview__search js-search-overview form-group" method="get" action="<?php echo home_url(); ?>" role="search">
                <input class="search-input form-control" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'gameexp' ); ?>">
                <button class="search-submit btn btn-primary" type="submit">Zoek</button>
            </form>
            <div class="js-ajax-posts">

            <?php $query = new WP_Query([
                'posts_per_page' => -1,
                'post_type' => 'game',
            ]);
                while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php include get_stylesheet_directory() . '/inc/article-game.php' ?>

            <?php endwhile; wp_reset_query(); ?>
        </div>

		</section>
		<!-- /section -->
	</main>

<?php get_footer('small'); ?>
