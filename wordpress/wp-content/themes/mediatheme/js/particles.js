const init = () => {
	const canvas = document.querySelector('#particles');
	const ctx = canvas.getContext('2d');
	const particleSize = [7, 5, 3];
	const colors = ['#BCCF04', '#EA499C', '#4FC6E0', '#F3943E'];
	const pixelRatio = window.devicePixelRatio;
	const particles = [];

	// Get the window's width for later use
	function getWindowWidth() {
		const width = window.innerWidth;

		return width;
	}

	// Store the window's width and height. If the window is wider than the
	// largest container, use that value
	const currentWidth = (getWindowWidth() > 1280) ? 1280 : getWindowWidth();
	const currentHeight = (currentWidth / 4) + 48;

	// The particle definition and rules on how it interacts with the canvas' boundries
	class Particle {
		constructor(x, y, radius, color) {
			this.x = x;
			this.y = y;
			this.dx = (Math.random() - 0.5);
			this.dy = (Math.random() - 0.5);
			this.radius = radius;
			this.color = color;
		}

		draw() {
			ctx.beginPath();
			ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
			ctx.fillStyle = this.color;
			ctx.fill();
		}

		// Update the canvas with each call of the requestAnimationFrame method.
		// Make sure that the particles spawn inside of the canvas and are bound
		// to it
		update() {
			// If the particles hit either edge of the canvas, reverse the direction
			// by switching the velocity to negative values.
			if ((this.x + this.radius > currentWidth) || (this.x - this.radius < 0)) {
				this.dx = -this.dx;
			}

			if ((this.y + this.radius > currentHeight) || (this.y - this.radius < 0)) {
				this.dy = -this.dy;
			}

			// Velocity
			this.x += this.dx;
			this.y += this.dy;

			// Redraw the circle each time the values change, hence animation
			this.draw();
		}
	}

	// Make sure that the canvas takes into account the retina displays and adjusts
	// the sizing accordingly. Otherwise it looks blurry
	if (!pixelRatio > 1) {
		canvas.width = currentWidth;
		canvas.height = currentHeight;
	} else {
		canvas.width = currentWidth * pixelRatio;
		canvas.height = currentHeight * pixelRatio;
		ctx.scale(pixelRatio, pixelRatio);
	}

	canvas.style.width = `${currentWidth}px`;
	canvas.style.height = `${currentHeight}px`;

	window.addEventListener('resize', getWindowWidth);

	// Spawn particles with randomized values, add them to an array
	for (let i = 0; i < particleAmount; i++) { // eslint-disable-line
		const radius = particleSize[Math.floor(Math.random() * particleSize.length)];
		const x = (Math.random() * (currentWidth - (radius * 2))) + radius;
		const y = (Math.random() * (currentHeight - (radius * 2))) + radius;
		const color = colors[Math.floor(Math.random() * colors.length)];
		particles.push(new Particle(x, y, radius, color));
	}

	// Animate them by calling every particle's update() method
	function animate() {
		requestAnimationFrame(animate);
		ctx.clearRect(0, 0, currentWidth, currentHeight);

		for (let i = 0; i < particleAmount; i++) { // eslint-disable-line
			particles[i].update();
		}
	}

	animate();
};

if (document.querySelector('#particles')) {
	init();
}
