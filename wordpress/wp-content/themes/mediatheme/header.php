<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
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
				<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php get_template_part( 'dist/images/inline', 'logo.svg' ); ?>
				</a>
			</div>
			<div class="site-navigation-right">
				<a id="js-search-open" class="nav-search icon icon-default" href="#" alt="Search">
					<?php get_template_part( 'dist/images/inline', 'search.svg' ); ?>
				</a>
				<a id="js-sidebar-open" class="nav-menu icon icon-default" href="#" alt="Menu">
					<span class="nav-menu-label"><?php echo __('Menu','mediatheme'); ?></span>
					<?php get_template_part( 'dist/images/inline', 'menu.svg' ); ?>
				</a>
			</div>
		</div>
	</header>
