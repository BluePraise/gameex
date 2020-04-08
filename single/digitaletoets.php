 <article id="post-<?php the_ID(); ?>" <?php post_class('container-fluid digitaletoets'); ?>>

        <div class="row">
            <div class="col-12">
                <h1 class="text-center"><?php the_title() ?></h1>
                <?php the_content(); ?>
            </div>
            <div class="col-12 border-top pt-4">
                <a href="#" class="btn btn-primary">Toets Aanpassen</a>
            </div>
        </div>
    </div>
</article><!-- /article -->


