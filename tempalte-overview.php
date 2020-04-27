<?php /* Template Name: Overview Page Template */ get_header(); ?>

	<main role="main" class="main-overview main-landing">
		<!-- section -->
        <?php get_sidebar() ?>
		<section class="main-overview__content">
            <form class="main-overview__search js-search-overview" method="get" action="<?php echo home_url(); ?>" role="search">
                <button class="search-icon" type="submit" role="button"><svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 23"><path d="M38.710696,48.0601792 L43,52.3494831 L41.3494831,54 L37.0601792,49.710696 C35.2632422,51.1481185 32.9839107,52.0076499 30.5038249,52.0076499 C24.7027226,52.0076499 20,47.3049272 20,41.5038249 C20,35.7027226 24.7027226,31 30.5038249,31 C36.3049272,31 41.0076499,35.7027226 41.0076499,41.5038249 C41.0076499,43.9839107 40.1481185,46.2632422 38.710696,48.0601792 Z M36.3875844,47.1716785 C37.8030221,45.7026647 38.6734666,43.7048964 38.6734666,41.5038249 C38.6734666,36.9918565 35.0157934,33.3341833 30.5038249,33.3341833 C25.9918565,33.3341833 22.3341833,36.9918565 22.3341833,41.5038249 C22.3341833,46.0157934 25.9918565,49.6734666 30.5038249,49.6734666 C32.7048964,49.6734666 34.7026647,48.8030221 36.1716785,47.3875844 C36.2023931,47.347638 36.2360451,47.3092237 36.2726343,47.2726343 C36.3092237,47.2360451 36.347638,47.2023931 36.3875844,47.1716785 Z" transform="translate(-20 -31)"></path></svg></button>
                <input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'gameexp' ); ?>">
                <button class="search-submit" type="submit">Zoek</button>
            </form>
			<div class="main-overview__in">

            <div class="main-overview__posts d-flex jcsb fx-wrap">
            <?php $query = new WP_Query(['posts_per_page' => -1, 'post_type' => 'game']); while ( $query->have_posts() ) : $query->the_post(); ?>
            <article id="post-<?php the_ID();?>" <?php post_class('game-post container');?>>

                <div class="row">

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

                        <div>
                            <?php html5wp_excerpt('html5wp_overview'); // Build your custom callback length in functions.php ?>
                        </div>
                    </div>
                </div>

            </article>

            <?php endwhile; wp_reset_query(); ?>

            </div>
							</div>


		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
