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
			<a class="facebook social-media-link" href="#" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'facebook.svg' ); ?>
			</a>
			<a class="twitter social-media-link" href="#" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'twitter.svg' ); ?>
			</a>
			<a class="youtube social-media-link" href="#" target="_blank" rel="noopener">
				<?php get_template_part( 'dist/images/inline', 'youtube.svg' ); ?>
			</a>
		</div>

	</div>
	<div id="content" class="site-content container-1280">
	<?php
		$sticky = get_option( 'sticky_posts' );
		$args = array(
			'posts_per_page' => 1,
			'post__in'  => $sticky,
			'ignore_sticky_posts' => 1
		);

		$query = new WP_Query( $args );

		$post_id = $query->posts[0];
		$author_id = $post_id->post_author;

		if ( isset($sticky[0]) && is_front_page() ): ?>
			<div class="gallery post-sticky">
				<?php if ( has_post_thumbnail() ): ?>
					<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
						<div class="gallery-thumbnail-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url() ) ?>');"></div>
					</a>
				<?php else: ?>
					<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
						<div class="gallery-thumbnail-gradient" style="<?php echo get_gradient(); ?>"></div>
					</a>
				<?php endif; ?>

				<div class="gallery-meta">
					<div class="gallery-meta-title">
						<div class="gallery-category">
							<?php add_categories(3); ?>
						</div>
						<?php the_title( '<h2 class="gallery-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
						<p><?php echo get_limited_excerpt(36); ?></p>
					</div>
					<div class="gallery-info">
						<div class="gallery-author">
							<?php echo get_avatar( get_the_author_meta('ID', $author_id), 48 ); ?>
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) ?>">
								<?php echo the_author_meta('display_name', $author_id); ?>
							</a>
						</div>

						<a class="btn btn-double btn-block" 
						href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
						<?php echo __('Read More', 'mediatheme') ?></a>
					</div>
				</div>
			</div>
		<?php 
			endif; 
		?>
		<div class="content-title">
			<h2><?php echo __('Latest Articles', 'mediatheme_trans'); ?></h2>
		</div>

		<div id="primary" class="gallery-container">
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
