<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mediatheme
 */

get_header(); ?>
	<div id="content" class="site-content bg-white">
		<article id="js-article" class="post-single container-740">
			<?php
			while ( have_posts() ) : the_post(); ?>
			<div class="content-title">
				<span class="post-date">
					<?php echo get_the_date( 'l F j, Y' ); ?>
				</span>
				<?php
					the_title( '<h1>', '</h1>' );
					the_excerpt();
				?>
			</div>
			<?php

				the_content();
			?>
		</article>
	</div>
	<div class="container-740">
		<?php if ( function_exists( 'echo_crp' ) ) { echo_crp(); } ?>
	</div>
	<div class="container-740">
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
	<?php
		$previous_post = get_previous_post();
		$next_post = get_next_post();
	?>
	<div id="js-progress-header" class="scroll-header">
		<div class="post-navigation just-start">
			<?php if ( !empty( $next_post ) ): ?>
				<a class="post-navigation-next" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
					<div class="post-navigation-icon">
						<?php get_template_part( 'dist/images/inline', 'arrow-left.svg' ); ?>
					</div>
					<div class="post-navigation-title text-left">
						<small><?php echo __('Newer Article', 'mediatheme'); ?></small>
						<h5><?php echo substr($next_post->post_title, 0, 35); ?></h5>
					</div>
				</a>
			<?php endif; ?>
		</div>

		<div class="scroll-header-title just-center">
		<?php echo do_shortcode("[mashshare]"); ?>
			<?php
				if ( strlen($post->post_title) > 35 ) {
					echo substr(the_title('<h5>', '</h5>', FALSE), 0, 35) . '...';
				} else {
					the_title('<h5>', '</h5>');
				}

			?>
		</div>
		<div class="post-navigation just-end">
			<?php if ( !empty( $previous_post ) ): ?>
				<a class="post-navigation-previous" href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
					<div class="post-navigation-title text-right">
						<small><?php echo __('Older Article', 'mediatheme'); ?></small>
						<h5><?php echo substr($previous_post->post_title, 0, 35); ?></h5>
					</div>
					<div class="post-navigation-icon">
						<?php get_template_part( 'dist/images/inline', 'arrow-right.svg' ); ?>
					</div>
				</a>
			<?php endif; ?>
		</div>
		<div id="js-progress-bar" class="scroll-header-progress"></div>
	</div>
	<?php
		endwhile; // End of the loop.
	?>

<?php
get_sidebar();
get_footer();
