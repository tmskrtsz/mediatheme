<?php get_header(); ?>
	<main class="wrapper">
		<div class="container w-980 is-centered">
			<div class="section-heading p2">
				<h1>Search Results</h1>
			</div>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php get_template_part('partials/post-list'); ?>

			<?php endwhile; ?>

				<?php get_template_part('partials/nav'); ?>

			<?php else : ?>

				<h2>No posts found.</h2>

			<?php endif; ?>
		</div>
	</main>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
