
</div><!-- #content -->

<div id="js-search-overlay" class="search-overlay">
	<div class="search-overlay-inner container-640">
		<a id="js-search-close" class="search-close icon icon-lg" href="#" alt="Close search">
			<?php get_template_part( 'dist/images/inline', 'x.svg' ) ?>
		</a>
		<?php dynamic_sidebar( 'search' ); ?>
	</div>
</div>

<footer id="colophon" class="site-footer">
	<div class="site-footer-inner container-1280">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mediatheme' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'mediatheme' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'mediatheme' ), 'mediatheme', '<a href="http://www.redbeak.net">Tamás Kertész</a>' );
			?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
