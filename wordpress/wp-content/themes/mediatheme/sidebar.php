<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mediatheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="js-sidebar" class="widget-area sidebar">
	<header class="sidebar-header">
		<h2>Sidebar</h2>
		<a id="js-sidebar-close" class="icon icon-default" href="#" alt="Close sidebar">
			<?php get_template_part( 'dist/images/inline', 'x.svg' ) ?>
		</a>
	</header>
	<div class="sidebar-inner">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->
