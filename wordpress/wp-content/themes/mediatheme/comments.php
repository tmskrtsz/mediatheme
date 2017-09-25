<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mediatheme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One comment', 'mediatheme' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment', '%1$s comments', $comment_count, 'comments title', 'mediatheme' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => '42',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mediatheme' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	comment_form(array(
		'comment_field' => '
			<div id="js-comment-textarea" class="input comment-form-comment">
				<label for="comment">Comment</label>
				<textarea id="comment" name="comment" cols="45" rows="1" maxlength="65525" aria-required="true" required="required" placeholder="'. __('Write a response...', 'mediatheme') .'"></textarea>
			</div>
		',
		'fields' => array(
				'author' => '
					<div id="js-comment-details" class="comment-form-details">
					<div id="js-comment-author" class="input comment-author">
						<label for="author">Your Name</label>
						<input id="author" name="author" type="text" placeholder="'. __('Name', 'mediatheme') .'" required="required"/>
					</div>
				',
				'email' => '
					<div id="js-comment-email" class="input comment-email">
						<label for="email">Your Email</label>
						<input id="email" name="email" type="text" placeholder="'. __('Email', 'mediatheme') .'" required="required"/>
					</div>
				',
				'url' => '</div>',
			),
		'comment_notes_before' => '',
		'class_submit' => 'btn btn-primary',
		'logged_in_as' => '',
		)
	);
	?>

</div><!-- #comments -->
