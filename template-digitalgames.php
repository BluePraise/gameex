<?php /* Template Name: Digital Toetsen Template */ get_header(); ?>

	<main role="main" class="main-overview main-landing container">
		<!-- section -->
        <?php get_sidebar('toetsen') ?>
		<section class="main-overview__content">


           <!--  <form class="main-overview__search js-search-overview form-group" method="get" action="<?php //echo home_url(); ?>" role="search">
                <input class="search-input form-control" type="search" name="s" placeholder="<?php //_e( 'To search, type and hit enter.', 'gameexp' ); ?>">
                <button class="search-submit btn btn-primary" type="submit">Zoek</button>
            </form> -->


            <div class="main-overview__posts d-flex jcsb fx-wrap js-ajax-posts js-loading-container">
            <?php $query = new WP_Query([
                'posts_per_page' => -1,
                'post_type'      => 'post',
                'category_name'  => 'digitale-toets'
            ]);

             while ( $query->have_posts() ) : $query->the_post(); ?>
           <?php include get_stylesheet_directory() . '/inc/article-digital.php' ?>

            <?php endwhile; wp_reset_query(); ?>


			</div>


		</section>
		<!-- /section -->
	</main>

<?php get_footer('small'); ?>
