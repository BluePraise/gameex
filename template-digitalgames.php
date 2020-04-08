<?php /* Template Name: Digital Toetsen Template */ get_header(); ?>

	<main role="main" class="main-overview main-landing">
		<!-- section -->
        <?php get_sidebar('toetsen') ?>
		<section class="main-overview__content">


            <form class="main-overview__search js-search-overview form-group" method="get" action="<?php echo home_url(); ?>" role="search">
                <input class="search-input form-control" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'gameexp' ); ?>">
                <button class="search-submit btn btn-primary" type="submit">Zoek</button>
            </form>


            <div class="main-overview__posts d-flex jcsb fx-wrap">
            <?php $query = new WP_Query([
                'posts_per_page' => -1,
                'post_type'      => 'post',
                'category_name'  => 'digitale-toets'
            ]);

             while ( $query->have_posts() ) : $query->the_post(); ?>
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

                        <div class="single-fields">

                            <div>
                                <strong>Vak:</strong> <span><?php the_field('vak') ?></span>
                            </div>
                            <div>
                                <?php if (get_field('jaar')): ?>
                                <strong>Jaar:</strong> <span> <?php the_field('jaar') ?> </span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if (get_field('aantal_vragen')): ?>
                                <strong>Aantal Vragen:</strong> <span> <?php the_field('aantal_vragen') ?> </span>
                                <?php endif; ?>
                            </div>

                                <p class="korte-omschrijving"><?php the_field('korte_omschrijving'); ?></p>

                            <a href="#" class="btn btn-primary">Zet toets klaar</a>
                            <a href="<?php the_permalink();?>" class="btn btn-primary">Toets inzien</a>
                            <a href="#" class="btn btn-primary">Rapportage</a>
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
