<h4>Categories</h4>
<ul class="cat-list">
    <?php
        $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => '',
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
                'size' => 'medium',
                'term_id' => $category->term_id
            );

            if (function_exists('z_taxonomy_image_url')) {
                $category_image_url = esc_url( z_taxonomy_image_url($category->term_id) );

                if ( !empty( $category_image_url ) ) {
                    $category_image = 'background-image:url('. $category_image_url .');';
                }
            }

            echo sprintf(
                '<li>
                    <a class="cat-list-item text-center" href="%s" style="%s">
                        <span>%s</span>
                        <div class="cat-count">%s</div>
                    </a>
                </li>',
                esc_url( get_category_link( $category->term_id ) ),
                $category_image,
                $category->name,
                $category->count
            );
        }
    ?>
</ul>
