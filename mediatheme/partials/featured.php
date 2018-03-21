 <?php
    $sticky = get_option( 'sticky_posts' );

    /* Sort the stickies with the newest ones at the top */
    rsort( $sticky );

    $sticky = array_slice( $sticky, 0, 1 );

    /* Query sticky posts */
    $args = array(
        'post__in'            => $sticky,
        'ignore_sticky_posts' => 1
    );

    $the_query = new WP_Query( $args );
?>

<article class="column">
<?php
    if ( $the_query->have_posts() && isset($sticky[0])) :
        while ( $the_query->have_posts()) :
            $the_query->the_post();
?>
    <a href="<?php esc_url(the_permalink()); ?>" class="hero-featured">
        <div class="hero-featured-image post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large') ?>');">
            <div class="hero-featured-meta">
                <div class="post-byline">
                    <span><?php the_author(); ?></span>
                </div>
                <h2><?php the_title(); ?></h2>
                <time><?php the_time('F jS, Y'); ?></time>
            </div>
        </div>
<?php endwhile; ?>
    </a>
<?php else: ?>
    <div class="hero-featured-image no-image">
        <small>Edit post -> Publish -> Visibility -> Edit -> Sticky this post to the front page</small>
    </div>
<?php endif; ?>
</article>

<?php wp_reset_postdata(); ?>
