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
				<a class="site-logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>">
					<?php get_template_part( 'dist/images/inline', 'logo.svg' ); ?>
				</a>
			</div>
			<div class="site-navigation-right">
				<a id="js-search-open" class="nav-searchn icon icon-default" href="#" alt="Search">
					<?php get_template_part( 'dist/images/inline', 'search.svg' ); ?>
				</a>
				<a id="js-sidebar-open" class="nav-menu icon icon-default" href="#" alt="Menu">
					<span class="nav-menu-label"><?php echo __('Menu','mediatheme'); ?></span>
					<?php get_template_part( 'dist/images/inline', 'menu.svg' ); ?>
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

		<?php
			$sticky = get_option( 'sticky_posts' );
			$args = array(
				'posts_per_page' => 1,
				'post__in'  => $sticky,
				'ignore_sticky_posts' => 1
			);

			$query = new WP_Query( $args );

			$post_id = $query->posts[0];
			$author_id = $post_id->post_author;
			$categories = get_the_category($post_id);

			if ( isset($sticky[0]) && is_front_page() ): ?>
				<div class="gallery post-sticky">
					<?php if ( has_post_thumbnail() ): ?>
						<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
							<div class="gallery-thumbnail-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url() ) ?>');"></div>
						</a>
					<?php else: ?>
						<a class="gallery-thumbnail" href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
							<div class="gallery-thumbnail-gradient" style="<?php echo get_gradient(); ?>"></div>
						</a>
					<?php endif; ?>

					<div class="gallery-meta">
						<div class="gallery-meta-title">
							<div class="gallery-category">
								<?php 
									if ( !empty($categories) ){
										for ( $i = 0; $i < 3; $i++) { 
											echo sprintf('<a class="pill pill-pink gallery-category-link" href="%s">%s</a>', esc_url( get_category_link( $categories[$i] ) ), $categories[$i]->name);
										}
									}
								?>
							</div>
							<?php the_title( '<h2 class="gallery-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
							<p><?php echo get_limited_excerpt(36); ?></p>
						</div>
						<div class="gallery-info">
							<div class="gallery-author">
								<?php echo get_avatar( get_the_author_meta('ID', $author_id), 48 ); ?>
								<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ) ) ?>">
									<?php echo the_author_meta('display_name', $author_id); ?>
								</a>
							</div>

							<a class="btn btn-double btn-block" 
							href="<?php echo esc_url( get_permalink($post->ID) ) ?>">
							<?php echo __('Read More', 'mediatheme') ?></a>
						</div>
					</div>
				</div>
		<?php 
			endif; 
		?>
	</div>
