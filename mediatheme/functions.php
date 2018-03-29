<?php
// Theme Scripts & Styles
function theme_scripts() {
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/dist/main.bundle.css', array() );
    wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Karla:400,700' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/main.bundle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/js/all.js', array(), '1.0.0', false );

    if (is_single() && !is_home()) {
        wp_enqueue_script( 'single', get_template_directory_uri() . '/dist/single.bundle.js', array(), '0.0.1', true );
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Theme Options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

// Add title tag to <head> section
add_theme_support( 'title-tag' );

if ( ! function_exists( '_wp_render_title_tag' ) ) :
    function theme_slug_render_title() {
        return '<title>' . wp_title( '|', true, 'right' ) . '</title>';
    }
    add_action( 'wp_head', 'theme_slug_render_title' );
endif;

// Add RSS links to <head> section
add_theme_support( 'automatic-feed-links' );

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Sidebar Widgets
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name'          => 'Sidebar Widgets',
        'id'            => 'sidebar-widgets',
        'description'   => 'These are widgets for the sidebar.',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5>',
        'after_title'   => '</h5>'
    ));

    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'description'   => 'The sidebar area on the /posts page',
        'class'         => 'anyad',
        'before_widget' => '<div class="blog-sidebar">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>'
    ));
}

// Add Read More link to excerpt
function new_excerpt_more($more) {
    global $post;
    return '…';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add Featured Image support
add_theme_support( 'post-thumbnails' );

// Set Featured Image
function feat_image() {
    if ( has_post_thumbnail() ) {
        // Get the post thumbnail URL
        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    } else {
        // Get the default featured image in theme options
        $feat_image = get_field('default_featured_image', 'option');
    }
    echo $feat_image;
}

// Custom Menus
register_nav_menus( array(
    'main_menu' => 'Main Menu',
    'footer_menu' => 'Footer Menu'
));

function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// WP Customizer
function mediatheme_customize_register( $wp_customize ) {
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

    $wp_customize->add_section( 'particles', array(
        'title'			=> 'Particle Settings',
        'description'	=> 'This controls the amount of particles on the page. Default is 25.',
        'priority'		=> '20'
    ) );

    $wp_customize->add_setting( 'particle_num', array(
        'default'		=> '15',
        'transport'		=> 'refresh'
    ) );

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'particle_num', array(
        'label'			=> 'Particle Number',
        'section'		=> 'particles',
        'settings'		=> 'particle_num'
    ) ) );
}
add_action( 'customize_register', 'mediatheme_customize_register' );

function remove_jetpack_share() {
    if ( is_singular( 'post' ) && function_exists( 'sharing_display' ) ) {
        remove_filter( 'the_content', 'sharing_display', 19 );
        remove_filter( 'the_excerpt', 'sharing_display', 19 );
    }
}
add_action( 'loop_start', 'remove_jetpack_share' );
?>
