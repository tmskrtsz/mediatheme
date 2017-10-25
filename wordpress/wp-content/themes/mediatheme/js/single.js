(($) => {
	$(document).ready(() => {
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
