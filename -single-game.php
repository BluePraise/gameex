<?php get_header(); ?>

	<main role="main" class="main-single">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="d-flex">
				<div class="post-thumbnail">
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</a>
					<?php endif; ?>
					<!-- /post thumbnail -->
				</div>

				<div class="d-flex fx-dir-col">
					<!-- post title -->
					<h1><?php the_title(); ?></h1>
					<!-- /post title -->
					<div class="single-fields">

						<div>
							<strong>Vak:</strong> <span><?php echo get_the_category()[0]->cat_name ?></span>
						</div>
						<!-- <div>
							<?php //if (get_field('target')): ?>
							<strong>Doel:</strong> <span> <?php //the_field('target') ?> </span>
							<?php //endif; ?>
						</div> -->
						<div>
							<?php if (get_field('age')): ?>
							<strong>Jaar:</strong> <span> <?php the_field('age') ?> </span>
							<?php endif; ?>
						</div>
						<!-- <div>
							<?php if (get_field('group_size')): ?>
							<strong>Ideale groepsgrootte:</strong> <span> <?php the_field('group_size') ?> </span>
							<?php endif; ?>
						</div> -->
						<div>
							<?php if (get_field('time')): ?>
							<strong>Tijd:</strong> <span> <?php the_field('time') ?> </span>
							<?php endif; ?>
						</div>
					</div>
					<?php if (get_field('game_link')): ?>
					<div class="mt-auto">
						<a href="<?php the_field('game_link') ?>" class="single-btn">Start spel</a>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="single-content">
				<div class="collapses">
					<?php if (get_field('game_story')): ?>
					<div class="collapse">
						<div class="collapse__top js-collapse">
							<strong>Het verhaal</strong>
							<button class="js-collapse-btn"></button>
						</div>
						<div class="collapse__content">
							<?php echo the_field('game_story') ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (get_field('game_manual')): ?>
					<div class="collapse">
						<div class="collapse__top collapse__top--closed js-collapse">
							<strong>Spel uitleg</strong>
							<button class="js-collapse-btn"></button>
						</div>
						<div class="collapse__content" style="display: none">
							<?php echo the_field('game_manual') ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (get_field('code_combinations')): ?>
					<div class="collapse">
						<div class="collapse__top collapse__top--closed js-collapse">
							<strong>Code combinaties</strong>
							<button class="js-collapse-btn"></button>
						</div>
						<div class="collapse__content" style="display: none">
							<?php echo the_field('code_combinations') ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (get_field('game_questions')): ?>
					<div class="collapse">
						<div class="collapse__top collapse__top--closed js-collapse">
							<strong>Verdiepingsvragen</strong>
							<button class="js-collapse-btn"></button>
						</div>
						<div class="collapse__content" style="display: none">
							<?php echo the_field('game_questions') ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="single-locks">
				<button><svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 24 24"><path d="M12 8c-1.062 0-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v1h2v-1c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8zm0 10c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2z"/></svg></button>
				<button><svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
				<button><svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
				<button><svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 24 24"><path d="M17 9.761v-4.761c0-2.761-2.238-5-5-5-2.763 0-5 2.239-5 5v4.761c-1.827 1.466-3 3.714-3 6.239 0 4.418 3.582 8 8 8s8-3.582 8-8c0-2.525-1.173-4.773-3-6.239zm-5 8.239c-1.104 0-2-.896-2-2s.896-2 2-2 2 .896 2 2-.896 2-2 2zm3-9.413c-.927-.376-1.938-.587-3-.587s-2.073.211-3 .587v-3.587c0-1.654 1.346-3 3-3s3 1.346 3 3v3.587z"/></svg></button>
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
