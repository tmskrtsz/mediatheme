<?php get_header(); ?>
	<main class="wrapper">
    <h1>Anyad nagyt kurva</h1>
        <div class="container w-1280 is-centered">
            <div class="columns">
                <div class="column is-one-quarter">
                    <p>Of the to any them. Totally more yourself sofa pleasures desk, a that my on of that boss examples us, windshield I of turn writing the than and a parts for the in dishonourable this feedback. Universal can pouring the since state performed to the would brown rely you every.</p>
                </div>
                <div class="column">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('partials/post-list'); ?>
					<?php endwhile; ?>
						<?php get_template_part('partials/nav' ); ?>

					<?php else : ?>

						<h2>Not Found</h2>

					<?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

