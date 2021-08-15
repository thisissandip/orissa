const dataToggleDD = document.querySelectorAll('.nav-item-toggle-btn');
const headermodal = document.querySelector('.header-modal');
const menuIcon = document.querySelector('.orissa-nav-menu-icon');
const closeIcon = document.querySelector('.orissa-theme-menu-close');

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
