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
let currentpage = parseInt(post_container?.dataset.page);
let maxPages = parseInt(post_container?.dataset.maxpage);

const loadmorebtn = document.querySelector('#load-more-post-btn');

if (currentpage === maxPages) {
	loadmorebtn?.remove();
}

loadmorebtn?.addEventListener('click', () => {
	currentpage = parseInt(post_container?.dataset.page);
	maxPages = parseInt(post_container?.dataset.maxpage);

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
				if (res.success && res.data != 'No more posts' && res.data != '') {
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
				}
			});
	}
	if (currentpage === maxPages - 1) {
		loadmorebtn.remove();
	}
});

/**
 * Load More Archive Posts Ajax
 */

const loadmorearchivebtn = document.querySelector('#load-more-archive-post-btn');

if (currentpage === maxPages) {
	loadmorearchivebtn?.remove();
}

loadmorearchivebtn?.addEventListener('click', () => {
	let searchterm = document.querySelector('#search-box').value;

	currentpage = parseInt(post_container?.dataset.page);
	maxPages = parseInt(post_container?.dataset.maxpage);

	if (currentpage < maxPages) {
		let params = new URLSearchParams();
		params.append('action', 'orissa_load_more_archive_posts');
		params.append('current_page', currentpage);
		params.append('search_term', searchterm);

		fetch('/wp-admin/admin-ajax.php', {
			method: 'POST',
			body: params,
		})
			.then((res) => res.json())
			.then((res) => {
				if (res.success && res.data != 'No more posts' && res.data != '') {
					post_container.dataset.page++;
					post_container.innerHTML += res.data;

					let getURL = window.location;
					let baseURL = getURL.protocol + '//' + getURL.host + '/';

					// get the search term
					let urlWithSearchTermarr = window.location.href.split('/').filter((e) => e != null && e != '');
					let baseURLarr = baseURL.split('/').filter((e) => e != null && e != '');
					let searchquery = urlWithSearchTermarr.at(2);

					if (urlWithSearchTermarr.length === 3) {
						searchquery = urlWithSearchTermarr.at(2);
					} else {
						searchquery = urlWithSearchTermarr.at(4);
					}
					window.history.pushState(
						'',
						'',
						baseURL + 'page/' + parseInt(post_container.dataset.page) + '/' + searchquery
					);
				}
			});
	}
	if (currentpage === maxPages - 1) {
		loadmorearchivebtn?.remove();
	}
});
