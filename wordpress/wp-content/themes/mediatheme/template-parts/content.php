<article class="col post">
	<?php if ( has_post_thumbnail() ): ?>
		<a class="post-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
			<?php the_post_thumbnail('custom-image-thumb'); ?>
		</a>
	<?php endif; ?>
	<div class="post-meta">
		<?php the_title( '<h2 class="post-title"><a href="' . 
			  esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<p>
			<?php 
				if ( has_post_thumbnail() ) {
					echo get_limited_excerpt(12);
				 }

				 else {
					 echo get_limited_excerpt(55);
				 }
			?>
		</p>
	</div>
	<div class="post-info">
		<div class="post-author">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 38 ); ?>
		<span><?php echo get_the_author(); ?></span>
		</div>
		<a class="btn btn-primary btn-block" 
		href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
		<?php echo __('Read more', 'mediatheme') ?></a>
	</div>
</article>
