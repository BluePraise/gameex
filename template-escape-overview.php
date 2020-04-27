<?php
    /* Template Name: Escape Games Overview */
    get_header();
?>

    <main role="main" class="escape-main-overview">
        <div class="content container">
            <a href="<?php echo site_url(); ?>/escape-games-met-box/" class="block-link row d-flex align-items-start">
                <img class="img-responsive col-md-4" src="<?php the_field('afbeelding_escape_games_met_box') ?>" alt="">
                <div class="col-md-8">
                    <h3><?php the_field('blok_titel_escape_box'); ?></h3>
                    <p><?php the_field('blok_descr_escape_box'); ?></p>
                </div>
            </a>

            <a href="<?php echo site_url(); ?>/escape-games/" class="block-link row d-flex align-items-start">
                <img class="img-responsive col-md-4" src="<?php the_field('afbeelding_escape_games'); ?>" alt="">
                <div class="col-md-8">
                    <h3><?php the_field('blok_titel_escape'); ?></h3>
                    <p><?php the_field('blok_descr_escape'); ?></p>
                </div>
            </a>

        </div>


    </main>

<?php get_footer('none'); ?>
