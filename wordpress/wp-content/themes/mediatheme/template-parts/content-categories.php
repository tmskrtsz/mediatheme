<?php
/**
 * Iterate through the categories and display them.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */
?>

<div class="cat gallery-container-4">
    <?php
        $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 0,
            'hierarchical'             => 1,
            'exclude'                  => '',
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'category',
            'pad_counts'               => false 
        );
        $categories = get_categories( $args );

        foreach( $categories as $category ) {

            $params = array(
                'size' => 'half',
                'term_id' => $category->term_id
            );
            
            if (function_exists('category_image_src')) {
                $category_image_url = esc_html( category_image_src( $params, false ) ) ;

                if ( !empty( $category_image_url ) ) {
                    $category_image = 'background-image:url('. $category_image_url .');';
                } else {
                    $category_image = get_gradient();
                }

            } else {
                $category_image = get_gradient();
            }

            echo sprintf(
                '<a class="col cat-box text-center" href="%s" style="%s">
                    <div class="cat-count">%s</div>
                    <h3>%s</h3>
                    <span>%s</span>
                </a>', 
                esc_url( get_category_link( $category->term_id ) ),
                $category_image,
                $category->count,
                $category->name,
                $category->description
            );
        }
    ?>
</div>
