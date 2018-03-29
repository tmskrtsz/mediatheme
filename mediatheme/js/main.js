require('./particles.js');
require('../scss/style.scss');

const sidebarToggle = document.querySelector('#sidebar-toggle');
const sidebarEl = document.querySelector('#sidebar');
const bodyEl = document.querySelector('body');
const headerEl = document.querySelector('.site-header');
let isSidebarActive = false;

document.addEventListener('click', (ev) => {
	if (sidebarToggle.contains(ev.target) && isSidebarActive === false) {
		ev.preventDefault();
		isSidebarActive = true;

		sidebarEl.classList.toggle('active');
		bodyEl.classList.toggle('is-active-sidebar');
	} else if (!sidebarEl.contains(ev.target)) {
		isSidebarActive = false;

		sidebarEl.classList.remove('active');
		bodyEl.classList.remove('is-active-sidebar');
	}
});

document.addEventListener('scroll', () => {
	if (window.pageYOffset > 0) {
		headerEl.classList.add('is-scrolling');
	} else if (window.pageYOffset <= 0) {
		headerEl.classList.remove('is-scrolling');
	}
});

// Scroll animation on clicking Learn More button
//
const anchorButton = document.querySelector("a[href='#learn-more']");

if (document.body.contains(anchorButton)) {
	document.querySelector("a[href='#learn-more']").addEventListener('click', (e) => {
		e.preventDefault();
		const scrollTopValue = jQuery('#learn-more').offset().top - 40;

		jQuery('html, body').animate({
			scrollTop: scrollTopValue,
		}, 'slow');
	});
}

