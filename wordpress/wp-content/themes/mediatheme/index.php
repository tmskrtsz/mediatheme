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
			if ( is_front_page() && is_home() ) : ?>
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

		<div class="content-title">
			<h2><?php echo __('Latest Articles', 'mediatheme_trans'); ?></h2>
		</div>

		<div id="primary" class="gallery-container-3">
			<?php
			$args = array(
				'posts_per_page' 		=> '10',
				'ignore_sticky_posts'	=> '1'
			);

			$the_query = new WP_Query( $args );

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

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
		</div>
<?php
get_sidebar();
get_footer();
