<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */

?>

<div <?php post_class('search-item'); the_title( 'aria-title="', '"' ); ?>>
	<header class="search-item-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="search-item-meta">
			<span>Written by</span>
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
				<?php echo get_the_author(); ?>
			</a>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="search-item-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<a class="btn btn-double btn-block" 
		href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
	<?php echo __('Read More', 'mediatheme') ?></a>
</div>
