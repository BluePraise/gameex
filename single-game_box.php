<?php get_header(); ?>

    <main role="main" class="main-single">

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="row">
            <?php
                    include 'single/tussen-singleescapebox.php';
             ?>

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
