<?php
/**
 * Individual article cards.
 *
 * @package Mediatheme
 */

 ?>
<div <?php post_class('col gallery') ?>>
	<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
		<?php if ( !has_post_thumbnail() ) : ?>
			<div class="gallery-thumbnail-gradient" style="<?php echo get_gradient(); ?>"></div>
		<?php else:
			the_post_thumbnail('custom-image-thumb');
		endif;

		if ( has_post_format('video') ): ?>
			<div class="gallery-type">
				<?php get_template_part( 'dist/images/inline', 'video.svg' ); ?>
			</div>

		<?php elseif ( has_post_format('chat') ): ?>
			<div class="gallery-type">
				<?php get_template_part( 'dist/images/inline', 'message-circle.svg' ); ?>
			</div>

		<?php elseif ( has_post_format('gallery') ): ?>
			<div class="gallery-type post-format-gallery">
				<?php get_template_part( 'dist/images/inline', 'image.svg' ); ?>
			</div>
		<?php endif; ?>
	</a>
	<div class="gallery-meta">
		<div class="gallery-category">
			<?php add_categories(1); ?>
		</div>
		<?php the_title( '<h2 class="gallery-title"><a href="' .
			  esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<p><?php echo get_limited_excerpt(12); ?></p>
	</div>
	<div class="gallery-info">
		<div class="gallery-author">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 38 ); ?>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
				<?php echo get_the_author(); ?>
			</a>
		</div>
		<a class="btn btn-double btn-block"
		href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
		<?php echo __('Read More', 'mediatheme') ?></a>
	</div>
</div>
