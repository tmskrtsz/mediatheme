<?php
/**
 * This is the template for the front page.
 */

get_header(); ?>
	<main class="wrapper">
		<?php get_template_part('partials/hero'); ?>
		<section class="section latest-posts">
			<div class="container w-1280 is-centered">
				<div class="section-heading text-center m5 m-clear-top">
					<h2>Latest Posts</h2>
				</div>
				<div class="columns is-multiline">
                    <?php // This is stupid, thanks WP
                        $temp = $wp_query; $wp_query= null;
                        $wp_query = new WP_Query();
                        $wp_query->query('ignore_sticky_posts=1' . '&posts_per_page=6' . '&paged='.$paged);

                        if ($wp_query->have_posts() ) {
                            while ( $wp_query->have_posts() ) {
                                $wp_query->the_post();
                                get_template_part('partials/post', 'grid');
                            }
                        } else {
                            echo esc_html('<p>No posts found.</p>');
                        }

                        wp_reset_postdata();
                    ?>
				</div>
				<div class="m3">
					<a href="<?php echo esc_url( get_page_link(2) ); ?>" class="btn btn-primary btn-icon">Browse all posts <i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</section>

		<section id="learn-more" class="section about bg-gray">
			<div class="container w-1280 is-centered">
				<div class="section-heading text-center m5 m-clear-top">
					<h2>Our Study Paths</h2>
				</div>
				<div class="columns">
					<div class="column is-flex align-center">
						<div class="box-content is-centered">
							<h3>Fine Arts</h3>
							<p class="m1 m-clear-top">Of the to any them. Totally more yourself sofa pleasures desk, a that my on of that boss examples us, windshield I of turn writing the than and a parts for the in dishonourable this feedback. Universal can pouring the since state performed to the would brown rely you every.</p>
							<a href="#" class="btn btn-link btn-icon">Apply Now <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
					<div class="column">
						<img src="https://source.unsplash.com/630x620" />
					</div>
				</div>

				<div class="columns">
					<div class="column">
						<img src="https://source.unsplash.com/630x620" />
					</div>
					<div class="column is-flex align-center">
						<div class="box-content is-centered">
							<h3>Interative Media</h3>
							<p class="m1 m-clear-top">Times, their sentinels had voices that excessive wild value expect, as during matters folks this my we of long trial. Activity except gift become on but not up days, the is venerable, odd during a people relative self-interest the size studies the been years; For, have not slowly increased the.</p>
							<a href="#" class="btn btn-link btn-icon">Apply Now <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>

				<div class="columns">
					<div class="column is-flex align-center">
						<div class="box-content is-centered">
							<h3>Music Production</h3>
							<p class="m1 m-clear-top">Six he far organization switching eager. Key the which horn measures was we pitiful would which from clue good often more and kicked endeavours, eye explain you of with just needs he ruining us, even time raised that divided feedback of don't woman installer. Work five with rush I the..</p>
							<a href="#" class="btn btn-link btn-icon">Apply Now <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
					<div class="column">
						<img src="https://source.unsplash.com/630x620" />
					</div>
				</div>
			</div>
		</section>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
