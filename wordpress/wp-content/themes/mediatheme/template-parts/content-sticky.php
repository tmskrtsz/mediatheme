<?php
/**
 * Template part for displaying sticky posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */
?>

<div class="content-title">
    <h2><?php echo __('Featured Article', 'mediatheme_trans'); ?></h2>
</div>
<?php
    $sticky = get_option( 'sticky_posts' );
    $args = array(
        'posts_per_page' => 1,
        'post__in'  => $sticky,
        'ignore_sticky_posts' => 1
    );

    $query = new WP_Query( $args );

    $post_id = $query->posts[0];
    $author_id = $post_id->post_author;

    if ( isset($sticky[0]) && is_front_page() ): ?>
        <div class="gallery post-sticky">
            <?php if ( has_post_thumbnail() ): ?>
                <a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
                    <div class="gallery-thumbnail-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url() ) ?>');"></div>
                </a>
            <?php else: ?>
                <a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
                    <div class="gallery-thumbnail-gradient" style="<?php echo get_gradient(); ?>"></div>
                </a>
            <?php endif; ?>

            <div class="gallery-meta">
                <div class="gallery-meta-title">
                    <div class="gallery-category">
                        <?php add_categories(3); ?>
                    </div>
                    <?php the_title( '<h2 class="gallery-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    <p><?php echo get_limited_excerpt(36); ?></p>
                </div>
                <div class="gallery-info">
                    <div class="gallery-author">
                        <?php echo get_avatar( get_the_author_meta('ID', $author_id), 48 ); ?>
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) ?>">
                            <?php echo the_author_meta('display_name', $author_id); ?>
                        </a>
                    </div>

                    <a class="btn btn-double btn-block" 
                    href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
                    <?php echo __('Read More', 'mediatheme') ?></a>
                </div>
            </div>
        </div>
    <?php 
        endif; 
    ?>
