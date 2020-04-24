<?php /* Template Name: Frontpage */ get_header(); ?>


    <?php if (have_posts()): while (have_posts()): the_post();?>
        <?php
            $thumbnail_jumbo  = get_post_thumbnail_id($post->ID);
            $featuredImage = wp_get_attachment_image_src( $thumbnail_jumbo , 'full');
            $thumbnail_jumbo = $featuredImage[0];
        ?>
<div class="jumbotron jumbotron-fluid d-flex align-items-center mb-md-5" style="background-image: url('<?php echo $thumbnail_jumbo; ?>');">

    <h2 class="display-4 text-white mx-auto"><?php the_title();?></h2>
</div> <!-- .jumbotron -->

<main role="main" class="container-sm">

<div class="container">
    <!-- article -->
    <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <!-- /post thumbnail -->
    <div class="row">
            <div class="post__content col-12">
                <!-- post title -->
                <?php the_content(); ?>
            </div>

    </div>
    <div class="row pb-md-5 pt-md-5">
        <div class="column col-md-4">
            <div class="figure"><img src="<?php the_field('kolom_1_-_afbeelding'); ?>" alt=""></div>
            <p><?php the_field('kolom_1_-_tekst'); ?></p>
        </div>
        <div class="column col-md-4">
            <div class="figure"><img src="<?php the_field('kolom_2_-_afbeelding'); ?>" alt=""></div>
            <p><?php the_field('kolom_2_-_tekst'); ?></p>
        </div>
        <div class="column col-md-4">
            <div class="figure"><img src="<?php the_field('kolom_3_-_afbeelding'); ?>" alt=""></div>
            <p><?php the_field('kolom_3_-_tekst'); ?></p>
        </div>
    </div>
</div>

        <?php edit_post_link();?>

    </article>
    <!-- /article -->
</div><!-- /wrapper -->
<?php endwhile;?>

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e('Sorry, nothing to display.', 'gameexp');?></h2>
    </article>
    <!-- /article -->

<?php endif;?>

    </main>

<?php get_footer(); ?>
