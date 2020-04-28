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
                    <!-- <span><?php //the_tags('<strong>Categorie: </strong>', ', ', ''); ?></span> -->
                    <strong>Categorie: </strong><span><?php the_field('game_category'); ?></span>
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
                    <?php if (get_field('korte_omschrijving')): ?>
                        <span> <?php the_field('korte_omschrijving') ?> </span>
                    <?php endif; ?>
                </div>

                <a href="<?php the_permalink();?>" class="btn btn-primary">Bekijk spel</a>
            </div>

        </div>
    </div>

</article>