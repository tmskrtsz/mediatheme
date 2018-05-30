<aside id="sidebar" class="sidebar">
    <?php
        wp_nav_menu(
            array(
                'items_wrap' => '<h5>Menu</h5><ul class="%2$s">%3$s</ul>',
                'container'       => 'nav',
				'container_class' => 'nav-responsive',
            )
        );
    ?>
    <div class="sidebar-content">
        <?php dynamic_sidebar('Sidebar Widgets'); ?>
    </div>
</aside>
