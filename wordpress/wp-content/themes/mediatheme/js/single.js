(($) => {
	$(document).ready(() => {
		// Initialize comment code
		const commentForm = $('#commentform');
		const commentTextArea = $('textarea#comment');
		const commentFields = $('#js-comment-details, p.form-submit');

		let commentActive = false;

		const toggleCommentBox = () => {
			if (!commentActive) {
				commentFields.css('display', 'none');
				commentTextArea.attr({
					rows: '1',
					style: 'height:"0"',
				});
			} else {
				commentFields.css('display', 'flex');
				commentTextArea.attr('rows', '8');
			}
		};

		const handleCommentTextArea = () => {
			commentActive = true;
			toggleCommentBox();
		};

		commentForm.on('click', handleCommentTextArea);

		const textAreaExpand = () => {
			if (commentActive) {
				$(this)
					.height(128)
					.height(this.scrollHeight);
			}
		};
		// Enlarge the textarea if the content eats up more space
		commentTextArea.on('change keyup keydown paste cut', textAreaExpand);

		$('#js-comment-details').prependTo(commentForm);
		toggleCommentBox();

		// Remove styles and states on clicking off elemnts
		$(document).on('click keydown', (event) => {
			if (!commentForm.is(event.target) && commentForm.has(event.target).length === 0) {
				if (!commentTextArea.val()) {
					commentActive = false;
					toggleCommentBox();
				}
			}
		});

		$(window).on('scroll', () => {
			const winScroll = $(window).scrollTop();
			const winHeight = $(window).height();
			const article = $('#js-article');
			const articleHeight = article.outerHeight(true);

			if (winScroll >= article.offset().top) {
				$('#js-progress-header').addClass('active');
			} else {
				$('#js-progress-header').removeClass('active');
			}

			const totalWidth = () => {
				let currentHeight = (winScroll / (articleHeight - winHeight)) * 100;

				if (currentHeight >= 100) {
					currentHeight = `${100}%`;
					return currentHeight;
				}

				return `${currentHeight}%`;
			};

			$('#js-progress-bar').css('width', totalWidth());
		});
	});
})(jQuery);
