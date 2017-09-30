<div <?php post_class('col gallery') ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
			<?php the_post_thumbnail('custom-image-thumb'); ?>
		</a>
	<?php else: ?>
		<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
			<div class="gallery-thumbnail-gradient" style="<?php echo get_gradient(); ?>"></div>
		</a>
	<?php endif; ?>
	<div class="gallery-meta">
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
