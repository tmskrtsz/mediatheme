<!DOCTYPE html>

<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="width=device-width">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="site-header is-flex align-center">
	<div class="header-inner columns is-centered">
		<?php

			$defaults = array(
				'theme_location'  => 'main_menu',
				'menu'            => 'Main Menu',
				'container'       => 'nav',
				'container_class' => 'column main',
				'container_id'    => 'nav',
				'menu_class'      => ''
			);

			wp_nav_menu( $defaults );

		?>
		<div class="site-logo column text-center">
			<a href="<?php echo get_site_url(); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="TAMK Media & Arts" />
			</a>
		</div>
		<div class="column text-right is-flex justify-end align-center">
			<a id="sidebar-toggle" class="menu-icon" href="#" aria-label="Sidebar Menu">
				<span></span>
				<span></span>
				<span></span>
			</a>
		</div>
		<?php if ( is_single() && !is_home() ): ?>
			<div id="js-progress" class="article-progress"></div>
		<?php endif; ?>
	</div>
</header>
