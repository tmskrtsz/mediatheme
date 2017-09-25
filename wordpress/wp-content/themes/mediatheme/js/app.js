( function( $ ) {
	"use strict";

	$(document).ready(function() {
		
		// Initialize comment code
		var commentForm = $('#commentform'),
				commentTextArea = $('textarea#comment'),
				commentFields = $('#js-comment-details, p.form-submit'),
				commentActive = false;
			
		$('#js-comment-details').prependTo(commentForm);

		function toggleCommentBox() {
			if (!commentActive) {
				commentFields.css('display', 'none');
				commentTextArea.attr({
					'rows': '1',
					'style': 'height:"0"',
				});
			} else {
				commentFields.css('display', 'flex');
				commentTextArea.attr('rows', '8');
			}
		}
		
		toggleCommentBox();

		commentForm.on('click', handleCommentTextArea);

		function handleCommentTextArea() {
			commentActive = true;
			toggleCommentBox();
		}

		// Enlarge the textarea if the content eats up more space
		commentTextArea.on('change keyup keydown paste cut', function(){
			if (commentActive) {
				$(this).height(128).height(this.scrollHeight);
			}
		});

		// Remove styles and states on clicking off elemnts
		$(document).on('click', function(e) {
			if (!commentForm.is(e.target) && commentForm.has(e.target).length === 0) {
				if ( !commentTextArea.val() ) {
					commentActive = false;
					toggleCommentBox();
				}
			}
		}); 

	});		

} )(jQuery);
