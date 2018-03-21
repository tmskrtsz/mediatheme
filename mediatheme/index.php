<?php get_header(); ?>
	<main class="wrapper">
		<?php get_template_part('partials/hero'); ?>
		<section class="section latest-posts">
			<div class="container w-1280 is-centered">
				<div class="section-heading text-center m5 m-clear-top">
					<h2>Latest Posts</h2>
				</div>
				<div class="columns is-multiline">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('partials/post-list'); ?>
					<?php endwhile; ?>
						<?php get_template_part('partials/nav' ); ?>

					<?php else : ?>

						<h2>Not Found</h2>

					<?php endif; ?>
				</div>
				<div class="m3">
					<a href="#" class="btn btn-primary">Browse all posts</a>
				</div>
			</div>
		</section>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
