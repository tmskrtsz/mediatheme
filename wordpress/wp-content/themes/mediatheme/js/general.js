(($) => {
	$(document).ready(() => {
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
			if ((searchActive && event.keyCode === 27) || (sidebarActive && event.keyCode === 27)) {
				closeSearch();
				closeSidebar();
			}
		});

		$(function () {
			const scrollPositionTop = 0;
			const headerBar = $('.site-header');
			let lastScrollTop = scrollPositionTop;

			$(window).scroll(() => {
				const scrollPosition = $(this).scrollTop();

				if (Math.abs(lastScrollTop - scrollPosition) <= 5) return;

				if (scrollPosition > lastScrollTop) {
					if (headerBar.hasClass('header-sticky')) {
						headerBar.removeClass('header-sticky');
						headerBar.addClass('header-hidden');
					}
				} else {
					headerBar.addClass('header-sticky');
				}

				if (scrollPosition !== 0) {
					headerBar.addClass('header-hidden');
				}

				lastScrollTop = scrollPosition;
			});
		});
	});
})(jQuery);
