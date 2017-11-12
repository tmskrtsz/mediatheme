<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */

get_header(); ?>
	<div id="content" class="site-content container-1280">
	<div class="content-title">
		<?php
			the_archive_title( '<h2 class="page-title">', '</h2>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</div>
	<div id="primary" class="gallery-container-3">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

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
