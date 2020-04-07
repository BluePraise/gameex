<?php get_header(); ?>

    <main role="main" class="main-single">


    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <?php
            // $cat            = get_the_category()[0]->cat_ID;
            // $escapegames    = 21;
            // $escapegamesbox = 4;
            // $digitaltest    = 3;

            // if ( $cat = 21 ) {
            //     get_template_part( 'single/escapegames');
            // }
            // elseif ( $cat = 4 ) {
            //     get_template_part( 'single/escapegamesbox');
            // }
            // elseif ( $cat = 3 ) {
            //     get_template_part( 'single/digitaletoets');
            // }

            if ( in_category('Escape Games') ) {

                include 'single/escapegames.php';

            }
            elseif ( in_category('Digitale Toets') ) {

                include 'single/digitaletoets.php';

            }
            elseif ( in_category('Escape Games met Box') ) {

                include 'single/escapegamesbox.php';

            }
            else {
                    // Continue with normal Loop
                    echo "nothing going on here";
                    // ...
                }

        endwhile; endif; ?>

    </main>
<?php get_footer('small'); ?>
