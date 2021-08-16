const dataToggleDD = document.querySelectorAll('.nav-item-toggle-btn');
const headermodal = document.querySelector('.header-modal');
const searchmodal = document.querySelector('.search-modal');
const searchmodalOverlay = document.querySelector('.search-modal-overlay');
const menuIcon = document.querySelector('.orissa-nav-menu-icon');
const searchIcon = document.querySelector('.orissa-search-icon');
const closeIcon = document.querySelector('.orissa-theme-menu-close');
const searchClose = document.querySelector('.orissa-theme-search-close');

const menuitemstimeline = gsap.timeline({ defaults: { duration: 0.5 } });

dataToggleDD.forEach((navItem) => {
	navItem.addEventListener('click', () => {
		navItem.querySelector('i').classList.toggle('rotate-chevron');
		navItem.nextElementSibling.classList.toggle('show-dropdown');
	});
});

menuIcon.addEventListener('click', () => {
	headermodal.style.top = '0';
	menuitemstimeline.from('.menu-item', { opacity: '0', ease: 'power2.in', stagger: 0.04 });
});

closeIcon.addEventListener('click', () => {
	headermodal.style.top = '-100%';
});

// search modal

const closeModal = () => {
	searchmodalOverlay.style.pointerEvents = 'none';
	searchmodalOverlay.style.opacity = '0';
	searchmodal.style.top = '-100%';
};

searchIcon.addEventListener('click', () => {
	searchmodalOverlay.style.pointerEvents = 'initial';
	searchmodalOverlay.style.opacity = '1';
	searchmodal.style.top = '0';
});

searchmodalOverlay.addEventListener('click', closeModal);

searchClose.addEventListener('click', closeModal);

// initial navbar animation

const navbartimeline = gsap.timeline({ defaults: { duration: 0.3 } });

navbartimeline
	.from('.header-title', { opacity: '0', ease: 'power2.in' })
	.from('.header-menu', { opacity: '0', ease: 'power2.in', delay: 0.2 });
