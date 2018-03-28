<?php get_header(); ?>
	<main class="wrapper single">
		<div class="container w-1280 is-centered">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="section-heading m2 m-clear-top p3">
					<?php the_category(); ?>
					<div class="author is-flex align-center p1">
						<div class="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 48 ); ?>
						</div>
						<div class="author-name">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
								<?php
								echo sprintf('%s %s',
								get_the_author_meta( 'first_name' ),
								get_the_author_meta( 'last_name' ));
								?>
							</a>
						</div>
						<div class="article-timestamp">
							<time>
								<?php the_time('F jS, Y'); ?>
							</time>
						</div>
					</div>
					<div class="share-buttons article-share w-720 is-centered">
						<a href="<?php esc_url(the_permalink()); ?>?share=facebook" class="facebook" target="_blank" rel="noopener noreferrer">
                        	<i class="fab fa-facebook-f fa-lg" style="color:#3b5998"></i>
						</a>
						<a href="<?php esc_url(the_permalink()); ?>?share=twitter" class="twitter" target="_blank" rel="noopener noreferrer">
							<i class="fab fa-twitter fa-lg" style="color:#1da1f2"></i>
						</a>
					</div>
					<h1><?php the_title(); ?></h1>
					<p><?php the_excerpt(); ?></p>
				</div>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="article-banner-wrapper m5">
						<div class="article-banner" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>')"></div>
					</div>
				<?php endif; ?>
				<article id="js-content" class="main">
					<?php the_content(); ?>
				</article>

		</div>
		<div class="bg-gray p2">
			<div class="container w-720 is-centered">
				<?php comments_template(); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
