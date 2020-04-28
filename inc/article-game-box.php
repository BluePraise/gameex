<article id="post-<?php the_ID();?>" <?php post_class('game-post container mb-5 pb-5');?>>

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
            <ul class="rating">
                <li><i data-feather="star"></i></li>
                <li><i data-feather="star"></i></li>
                <li><i data-feather="star"></i></li>
                <li><i data-feather="star"></i></li>
                <li><i data-feather="star"></i></li>
            </ul>
            <!-- /post title -->
            <div class="single-fields">
                <div>
                    <!-- <span><?php //he_tags('<strong>Categorie: </strong> ', ', ', ''); ?></span> -->
                    <strong>Categorie: </strong><span><?php the_field('game_box_category'); ?></span>
                </div>
                <div>
                    <strong>Doel:</strong> <span><?php the_field('target'); ?></span>
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


                <div>
                    <?php html5wp_excerpt('html5wp_overview'); // Build your custom callback length in functions.php ?>
                </div>

                <a href="<?php the_permalink();?>" class="btn btn-primary">Bekijk spel</a>
            </div>
                            <a href="#" class="d-block text-primary border-top pt-2 mt-3"><i data-feather="bookmark"></i><small>Voeg toe aan favorieten</small></a>
                        </div>
                    </div>

</article>