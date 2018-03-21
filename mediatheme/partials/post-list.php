<?php
/**
 * The main loop for the /posts page
 */

$categories = get_the_category();
?>

<article class="post post-list p2">
	<div class="post-inner columns">
		<div class="post-meta column is-flex">
			<?php if ( is_sticky() ): ?>
				<div class="post-featured">Featured Article</div>
			<?php endif; ?>
			<div class="post-byline is-flex align-center m1 m-clear-top">
				<div class="post-avatar is-flex">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 42 ); ?>
				</div>
				<?php
					echo sprintf('<a href="%1$s">%2$s %3$s</a>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author_meta( 'first_name' ),
						get_the_author_meta( 'last_name' )
					);
				?>
				<time><?php the_time('F jS, Y'); ?></time>
			</div>
			<a class="post-title" href="<?php esc_url( the_permalink() ); ?>">
				<h2><?php the_title(); ?></h2>
			</a>
			<?php the_excerpt(); ?>
			<a class="btn btn-primary btn-icon" href="<?php esc_url( the_permalink() ); ?>">Read More <i class="fa fa-angle-right"></i></a>
		</div>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-thumbnail-wrapper column is-one-third">
				<div class="post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>')">
					<div class="post-cat">
						<a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
							<?php
								if ( !empty( $categories ) ) {
									echo esc_html( $categories[0]->name );
								}
							?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</article>
