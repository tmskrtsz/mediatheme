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

		const sidebar = $('#js-sidebar');
		const sidebarToggle = $('#js-sidebar-open, #js-sidebar-close');

		let sidebarActive = false;

		function openSidebar() {
			sidebarActive = true;
			sidebar.addClass('active');
			$('body').addClass('sidebar-active');
		}

		function closeSidebar() {
			sidebarActive = false;
			sidebar.removeClass('active');
			$('body').removeClass('sidebar-active');
		}

		const handleSidebarToggle = (e) => {
			e.preventDefault();

			if (!sidebarActive) {
				openSidebar();
			} else {
				closeSidebar();
			}
		};

		sidebarToggle.on('click', handleSidebarToggle);

		let searchActive = false;

		function closeSearch() {
			searchActive = false;
			$('#js-search-overlay').removeClass('active');
			$('body').css('overflow', 'auto');
		}

		function openSearch() {
			searchActive = true;
			$('#js-search-overlay').addClass('active');
			$('body').css('overflow', 'hidden');
		}

		const handleSearchToggle = (e) => {
			e.preventDefault();
			if (!searchActive) {
				openSearch();
			} else {
				closeSearch();
			}
		};

		$('#js-search-open, #js-search-close').on('click', handleSearchToggle);

		// Remove styles and states on clicking off elemnts
		$(document).on('click keydown', (event) => {
			if (!commentForm.is(event.target) && commentForm.has(event.target).length === 0) {
				if (!commentTextArea.val()) {
					commentActive = false;
					toggleCommentBox();
				}
			}

			if ((searchActive && event.keyCode === 27) || (sidebarActive && event.keyCode === 27)) {
				closeSearch();
				closeSidebar();
			}
		});
	});
})(jQuery);
