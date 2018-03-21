<article class="post post-grid column is-one-third text-center">
	<a class="post-inner" href="<?php esc_url( the_permalink() ); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail-wrapper">
				<div class="post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>')"></div>
			</div>
		<?php endif; ?>
		<div class="post-meta">
			<div class="post-byline">
				<span>by <?php the_author(); ?></span>
			</div>
			<h3 class="post-title"><?php the_title(); ?></h3>
			<time><?php the_time('F jS, Y'); ?></time>
		</div>
	</a>
</article>
