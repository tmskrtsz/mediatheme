<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Nunito:400,700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="site-header">
		<div class="site-header-inner container-1280">
			<nav id="site-navigation" class="main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'		 => '',
					) );
				?>
			</nav>
			<div class="site-logo">
				<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			</div>
			<div class="site-navigation-right">
				<a class="nav-search" href="#" alt="Search">Search</a>
				<a class="nav-menu" href="#" alt="Menu">
					<span class="nav-menu-label"><?php echo __('Menu','mediatheme'); ?></span>
					<div class="nav-menu-icon">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</a>
			</div>
		</div>
	</header>
	<div class="site-branding container-1280">
		<?php
		the_custom_logo();
		if ( !is_single() ):
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>
			<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
		<?php
			endif; 
		endif; ?>
	</div>
