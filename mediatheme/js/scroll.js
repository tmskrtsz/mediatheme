// Scroll event
//
const article = document.querySelector('#js-content');
const progressBar = document.querySelector('#js-progress');
// const articleHeight = article.offsetHeight;
const windowHeight = document.body.offsetHeight;

document.addEventListener('scroll', () => {
	const scrollPosition = window.pageYOffset;
	const articleOffsetTop = article.getBoundingClientRect().top;

	const getProgressAmount = () => {
		const currentWidth = ((scrollPosition * 100) / (windowHeight - articleOffsetTop));

		return currentWidth * 2;
	};

	if (getProgressAmount() > 100) {
		progressBar.style.width = '100%';
	} else {
		progressBar.style.width = `${getProgressAmount()}%`;
	}
});

