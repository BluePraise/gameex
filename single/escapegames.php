
<!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('container-fluid escapegame'); ?>>

        <div class="row">
            <div class="col-12">
                <div class="text-center">

                    <?php the_title('<h1>') ?>
                </div>


                <?php the_content(); ?>

                <div class="label-pinwrapper">Voer de code in: </div>
                <div id="pinwrapper" class="text-center"></div>
                <div class="game-toggle-status row justify-content-between">

                    <a class="back col-3 text-left text-muted"><i data-feather="arrow-left"></i><span> Vorige</span></a>
                    <a class="again col-3 text-center text-primary"><i data-feather="refresh-cw"></i><span> Opnieuw</span></a>
                    <a class="again col-3 text-right text-success"><span>OK </span><i data-feather="arrow-right"></i></a>
                </div>


            </div>
        </div>
    </article>
        <!-- /article -->


