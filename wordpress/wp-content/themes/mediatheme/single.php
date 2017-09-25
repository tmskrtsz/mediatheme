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
		<article class="post-single container-740">
			<?php
			while ( have_posts() ) : the_post(); ?>
			<div class="content-title text-center">
				<span class="post-date">
					<?php echo get_the_date( 'l F j, Y' ); ?>
				</span>
				<?php 
					the_title( '<h1 class="gallery-title">', '</h1>' );
					the_excerpt();
				?>
			</div>
			<?php

				the_content();
			?>
		</article>
	</div>
	<div class="container-100">
		<div class="post-navigation">
			<?php
				$previous_post = get_previous_post();
				$next_post = get_next_post();
				$next_post_thumb = (get_next_post() ? get_the_post_thumbnail_url($next_post->ID, 'full') : '');
				$previous_post_thumb = (get_previous_post() ? get_the_post_thumbnail_url($previous_post->ID, 'full') : '');

				if ( !empty( $previous_post ) ): ?>
					<div class="post-previous" 
						<?php if ( empty( $previous_post_thumb ) ):?>
							style="background-color:#333;">
						<?php
						else: ?>
							style="background-image:url(<?php echo $previous_post_thumb; ?>);">
						<?php
						endif;
						?>
						<a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
							<small><?php echo __('Previous Article', 'mediatheme'); ?></small>
							<span class="post-navigation-title">
								<?php echo apply_filters( 'the_title', $previous_post->post_title ); ?>
							</span>
						</a>
					</div>
				<?php 
				endif; 

				if ( !empty( $next_post ) ): ?>
					<div class="post-next" style="background-image:url(<?php echo $next_post_thumb; ?>);">
						<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
							<small><?php echo __('Next Article', 'mediatheme'); ?></small>
							<span class="post-navigation-title">
								<?php echo apply_filters( 'the_title', $next_post->post_title ); ?>
							</span>
						</a>
					</div>
				<?php
				endif;
			?>
		</div>
	</div>
	<div class="container-640">
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</div>

<?php
get_sidebar();
get_footer();
