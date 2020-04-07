<?php get_header(); ?>

	<main role="main" class="main-single">


	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('containertest'); ?>>

			        <?php
                    $cat            = get_the_category()[0]->cat_name;
                    $escapegames    = "Escape Games";
                    $escapegamesbox = "Escape Game with box";
                    $digitaltest    = "Digitale Toets"
                ?>
                <?php
                    if ($cat = $escapegames) {
                        get_template_part( 'single/escapegames');
                    }

                    else{

                ?>


			<div class="row">
				<div class="col-md-12">

				<div class="single-locks text-center jcc mb-2">
					<button><svg xmlns="http://www.w3.org/2000/svg" width="100" viewBox="0 0 24 24"><path d="M12 8c-1.062 0-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v1h2v-1c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8zm0 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2z"/></svg></button>
					<button><svg xmlns="http://www.w3.org/2000/svg" width="100" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
					<button><svg xmlns="http://www.w3.org/2000/svg" width="100" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
					<button><svg xmlns="http://www.w3.org/2000/svg" width="100" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
				</div>

				<div class="mb-2">
					<?php the_content(); ?>
				</div>
				</div>
			</div>


	</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'gameexp' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</main>

<?php get_footer('small'); ?>
