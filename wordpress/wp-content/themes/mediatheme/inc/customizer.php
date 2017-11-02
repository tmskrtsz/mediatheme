<?php
/**
 * Mediatheme Theme Customizer
 *
 * @package Mediatheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mediatheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'mediatheme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'mediatheme_customize_partial_blogdescription',
		) );
	}


	$wp_customize->add_section( 'social_links', array(
		'title'			=> 'Social Media Links',
		'description'	=> 'The links should contain the protocol (https://) part.',
		'priority'		=> '30'
	) );

	$wp_customize->add_setting( 'facebook', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
		'label'			=> 'Facebook',
		'section'		=> 'social_links',
		'settings'		=> 'facebook'
	) ) );

	$wp_customize->add_setting( 'twitter', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
		'label'			=> 'Twitter',
		'section'		=> 'social_links',
		'settings'		=> 'twitter'
	) ) );
	
	$wp_customize->add_setting( 'youtube', array(
		'default'		=> '',
		'transport'		=> 'refresh'
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
		'label'			=> 'YouTube',
		'section'		=> 'social_links',
		'settings'		=> 'youtube'
	) ) );

}
add_action( 'customize_register', 'mediatheme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mediatheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mediatheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mediatheme_customize_preview_js() {
	wp_enqueue_script( 'mediatheme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'mediatheme_customize_preview_js' );
