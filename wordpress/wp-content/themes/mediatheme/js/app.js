(($) => {
  "use strict";

  $(document).ready(() => {
    // Initialize comment code
    const commentForm = $("#commentform"),
      commentTextArea = $("textarea#comment"),
      commentFields = $("#js-comment-details, p.form-submit");
		
		let commentActive = false;

    let toggleCommentBox = () => {
      if (!commentActive) {
        commentFields.css("display", "none");
        commentTextArea.attr({
          rows: "1",
          style: 'height:"0"'
        });
      } else {
        commentFields.css("display", "flex");
        commentTextArea.attr("rows", "8");
      }
    }

		let handleCommentTextArea = () => {
      commentActive = true;
      toggleCommentBox();
		}

    commentForm.on("click", handleCommentTextArea);

    // Enlarge the textarea if the content eats up more space
    commentTextArea.on("change keyup keydown paste cut", () => {
      if (commentActive) {
        $(this)
          .height(128)
          .height(this.scrollHeight);
      }
    });

    // Remove styles and states on clicking off elemnts
    $(document).on("click", (e) => {
      if (!commentForm.is(e.target) && commentForm.has(e.target).length === 0) {
        if (!commentTextArea.val()) {
          commentActive = false;
          toggleCommentBox();
        }
      }
		});
		
		$("#js-comment-details").prependTo(commentForm);
		toggleCommentBox();
		
  });
})(jQuery);
