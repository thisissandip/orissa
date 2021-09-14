/**
 * On Scroll Post reveal post
 */

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
				start: 'top+=50 bottom-=250',
				//markers: true,
			},
		});
	});
}

/* window.addEventListener('load', () => {
	init();
}); */

/**
 * Load More Ajax
 */

let post_container = document.querySelector('.posts-container');
let currentpage = post_container.dataset.page;
let maxPages = post_container.dataset.maxpage;

const loadmorebtn = document.querySelector('#load-more-post-btn');

if (currentpage === maxPages) {
	loadmorebtn.remove();
}

loadmorebtn?.addEventListener('click', () => {
	if (currentpage < maxPages) {
		let params = new URLSearchParams();
		params.append('action', 'orissa_load_more_posts');
		params.append('current_page', currentpage);

		fetch('/wp-admin/admin-ajax.php', {
			method: 'POST',
			body: params,
		})
			.then((res) => res.json())
			.then((res) => {
				post_container.dataset.page++;
				post_container.innerHTML += res.data;

				let getURL = window.location;
				let baseURL = getURL.protocol + '//' + getURL.host + '/';

				// check if slug is present of the blog page then add the slug
				let urlWithSlugarr = window.location.href.split('/').filter((e) => e != null && e != '');
				let baseURLarr = baseURL.split('/').filter((e) => e != null && e != '');

				if (urlWithSlugarr.length > baseURLarr.length) {
					baseURL += urlWithSlugarr.at(2) + '/';
				}

				window.history.pushState('', '', baseURL + 'page/' + parseInt(post_container.dataset.page));
			});
	} else {
		loadmorebtn.remove();
	}
});
