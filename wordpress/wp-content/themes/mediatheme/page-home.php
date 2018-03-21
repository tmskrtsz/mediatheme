<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */

get_header(); ?>
	<div class="site-branding container-1280">
		<canvas id="particles"></canvas>
		<?php
		the_custom_logo();
		if ( !is_single() ):
			if ( is_front_page() ) : ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php
			endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
			endif;
		endif; ?>
		<div class="social-media">
			<a class="facebook social-media-link" href="<?php echo get_theme_mod( 'facebook', '#' )?>" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'facebook.svg' ); ?>
			</a>
			<a class="twitter social-media-link" href="<?php echo get_theme_mod( 'twitter', '#' )?>" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'twitter.svg' ); ?>
			</a>
			<a class="youtube social-media-link" href="<?php echo get_theme_mod( 'youtube', '#' )?>" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'youtube.svg' ); ?>
			</a>
		</div>

	</div>
	<div class="container-1280">
		<?php get_template_part( 'template-parts/content', 'categories' ); ?>
	</div>
	<div id="content" class="site-content container-1280">
		<?php get_template_part( 'template-parts/content', 'sticky' ); ?>
		<?php wpb_latest_sticky(); ?>
		<div class="content-title p-3">
			<h2><?php echo __('Latest Articles', 'mediatheme_trans'); ?></h2>
		</div>

		<div id="primary" class="grid-container-3">
			<?php
			$the_query = new WP_Query( array(
				'posts_per_page' 		=> '6',
				'ignore_sticky_posts'	=> '1'
			) );

			if ( $the_query->have_posts() ) :

				/* Start the Loop */
				while ( $the_query->have_posts() ) : $the_query->the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
	</div>
	<div class="container-1280 p-7 text-center">
		<a href="/posts" class="btn btn-link">
			<span>Browse all posts</span>
			<?php get_template_part('dist/images/inline', 'arrow-right.svg') ?>
		</a>
	</div>
	<div class="bg-skewed">
		<div class="container-1280">
			<div class="content-title p-7 text-center">
				<h2>Study Paths</h2>
				<span>Learn more about what TAMK can offering you</span>
			</div>
		</div>
		<div class="container-1280">
			<div class="grid-container-2 p-7">
				<div class="col align-center">
					<div>
						<h2>Fine Arts</h2>
						<p class="p-1 f-17">Concept? Later been be covered that payload concept of up evaluation the had where but makers them, slid another the physics dressed every sick dishonourable in not can such pay knowing differences line state heard in young of to back when king's of the that frequency semantics, other it written.</p>
						<a href="#" class="btn btn-primary">Learn More</a>
					</div>
				</div>
				<div class="col">
					<img src="https://picsum.photos/600/460" />
				</div>
			</div>

			<div class="grid-container-2 p-4">
				<div class="col">
					<img src="https://picsum.photos/600/460" />
				</div>
				<div class="col align-center">
					<div>
						<h2>Interactive Media</h2>
						<p class="p-1 f-17">Concept? Later been be covered that payload concept of up evaluation the had where but makers them, slid another the physics dressed every sick dishonourable in not can such pay knowing differences line state heard in young of to back when king's of the that frequency semantics, other it written.</p>
						<a href="#" class="btn btn-primary">Learn More</a>
					</div>
				</div>
			</div>

			<div class="grid-container-2 p-4">
				<div class="col align-center">
					<div>
						<h2>Music Production</h2>
						<p class="p-1 f-17">Concept? Later been be covered that payload concept of up evaluation the had where but makers them, slid another the physics dressed every sick dishonourable in not can such pay knowing differences line state heard in young of to back when king's of the that frequency semantics, other it written.</p>
						<a href="#" class="btn btn-primary">Learn More</a>
					</div>
				</div>
				<div class="col">
					<img src="https://picsum.photos/600/460" />
				</div>
			</div>
		</div>
	</div>
<?php
get_sidebar();
get_footer();
