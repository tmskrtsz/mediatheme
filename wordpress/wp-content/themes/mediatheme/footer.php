
</div><!-- #content -->

<footer id="colophon" class="site-footer container">
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
</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
