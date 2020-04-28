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
                <a href="<?php the_field('google_drive_link');?>" class="btn btn-primary">Rapportage</a>
            </div>
        </div>


    </div>

</article>