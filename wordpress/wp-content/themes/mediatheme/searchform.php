<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package mediatheme
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo __( 'Search for:', 'label', 'mediatheme' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'mediatheme' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button class="btn btn-primary"><?php echo __( 'Search', 'mediatheme' ); ?></button>
</form>
