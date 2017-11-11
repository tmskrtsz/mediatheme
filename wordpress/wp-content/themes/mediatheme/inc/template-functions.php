<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Mediatheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mediatheme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'mediatheme_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function mediatheme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'mediatheme_pingback_header' );

function add_categories( $count ) {
	$categories = get_the_category();

	if ( !empty($categories) ) {
		foreach ($categories as $key=>$category) {
			if ($key > ($count - 1)) {
				break;
			} else {
				echo sprintf(
					'<a class="pill pill-pink gallery-category-link" href="%s">%s</a>', 
					esc_url( get_category_link( $category->term_id ) ), $category->name
				);
			}
		}	
	}
}
add_action( 'get_categories', 'add_categories' );

