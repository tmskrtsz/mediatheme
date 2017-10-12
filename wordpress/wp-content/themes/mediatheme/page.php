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
			<div class="content-title text-center">
				<span class="post-date">
					<?php echo get_the_date( 'l F j, Y' ); ?>
				</span>
				<?php 
					the_title( '<h1>', '</h1>' );
					the_excerpt();
				?>
			</div>
			<?php the_content(); ?>
		</article>
	</div>
	<?php
		endwhile; // End of the loop.
	?>

<?php
get_sidebar();
get_footer();
