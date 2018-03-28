<?php
/**
 * This template is for the /posts page
 */
get_header();

global $wp_query;
$page = $wp_query->get_queried_object();
$page_banner_id = $page->ID;

$page_title = get_the_title( get_option('page_for_posts', true) );
$page_content = get_post_field( 'post_content', get_option('page_for_posts', true) );
?>
	<main class="wrapper blog">
        <?php if ( has_post_thumbnail() ) : ?>
			<div class="blog-banner-wrapper">
				<div class="blog-banner-image is-flex" style="background-image:url('<?php echo get_the_post_thumbnail_url($page_banner_id, 'full') ?>')">
                    <div class="page-heading w-1280 is-centered text-center is-flex align-center justify-center dir-column">
                        <h1><?php echo esc_html($page_title); ?></h1>
                        <?php echo $page_content; ?>
                    </div>
                </div>
			</div>
		<?php endif; ?>
        <div class="container w-1280 is-centered p5">
            <div class="columns">
                <aside class="column is-one-quarter">
                    <?php get_template_part('partials/category', 'list'); ?>
                    <?php dynamic_sidebar('Blog Sidebar'); ?>
                </aside>
                <div class="column">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('partials/post', 'list'); ?>
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

