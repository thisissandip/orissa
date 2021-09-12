gsap.registerPlugin(ScrollTrigger);
const allPostPreviewCards = document.querySelectorAll('.post-preview-card');

function init() {
	allPostPreviewCards.forEach((card) => {
		gsap.to(card, {
			opacity: 1,
			y: 4,
			duration: 0.7,
			scrollTrigger: {
				trigger: card,
				start: 'top+=30 bottom-=350',
				//markers: true,
			},
		});
	});
}

window.addEventListener('load', () => {
	init();
});
