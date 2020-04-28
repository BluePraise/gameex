<?php get_header(); ?>

    <main role="main" class="main-single">

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
          <div class="d-flex">
            <div class="post-thumbnail col-md-4">
                <!-- post thumbnail -->
                <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail(); // Fullsize image for the single post ?>
                    </a>
                <?php endif; ?>
                <!-- /post thumbnail -->
            </div>

            <div class="col-md-8">
                <!-- post title -->
                <h1><?php the_title(); ?></h1>
                <!-- /post title -->
                <div class="single-fields">
                    <div>
                        <!-- <strong>Categorie:</strong> <span><?php //echo get_the_category()[0]->cat_name ?></span> -->
                        <strong>Categorie: </strong><span><?php the_field('game__category'); ?></span>
                    </div>
                    <div>
                        <?php if (get_field('target')): ?>
                        <strong>Doel:</strong> <span> <?php the_field('target') ?> </span>
                        <?php endif; ?>
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
                        <?php if (get_field('korte_omschrijving')): ?>
                            <span> <?php the_field('korte_omschrijving') ?> </span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (get_field('game_link')): ?>
                <div class="mt-auto">
                    <a href="<?php the_field('game_link') ?>" class="btn btn-primary">Start spel</a>
                </div>
                <?php endif; ?>
            </div>
        </div>


            </div>
            <div class="single-content">
                <div class="collapses-content">

                    <div class="collapse-container">
                        <div class="collapse__top js-collapse-story">
                            <strong>Het verhaal</strong>
                            <button class="js-collapse-btn"></button>
                        </div>
                        <div class="collapse__content">
                            <?php the_field('game_story') ?>
                        </div>
                    </div>

                    <?php if (get_field('game_manual')): ?>
                    <div class="collapse-container">
                        <div class="collapse__top collapse__top--closed js-collapse-story">
                            <strong>Spel uitleg</strong>
                            <button class="js-collapse-btn"></button>
                        </div>
                        <div class="collapse__content" style="display: none">
                            <?php the_field('game_manual') ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if (get_field('code_combinations')): ?>
                    <div class="collapse-container">
                        <div class="collapse__top collapse__top--closed js-collapse-story">
                            <strong>Code combinaties</strong>
                            <button class="js-collapse-btn"></button>
                        </div>
                        <div class="collapse__content" style="display: none">
                            <?php the_field('code_combinations') ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if (get_field('game_questions')): ?>
                    <div class="collapse-container">
                        <div class="collapse__top collapse__top--closed js-collapse-story">
                            <strong>Verdiepingsvragen</strong>
                            <button class="js-collapse-btn"></button>
                        </div>
                        <div class="collapse__content" style="display: none">
                            <?php the_field('game_questions') ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>


        </article>
        <!-- /article -->

    <?php endwhile; wp_reset_query(); ?>

    <?php else: ?>

        <!-- article -->
        <article>

            <h1><?php _e( 'Sorry, nothing to display.', 'gameexp' ); ?></h1>

        </article>
        <!-- /article -->

    <?php endif; ?>

    </section>
    <!-- /section -->
    </main>

<?php get_footer('small'); ?>
