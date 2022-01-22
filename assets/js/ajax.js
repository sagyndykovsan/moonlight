let page = '1';
let sortby = '';
let order = 'ASC';
let user = '';
let modalWindow = document.querySelector('.modal__window');
let modal = document.querySelector('.modal');
let modalYesBtn = document.querySelector('#modal-yes');
let modalNoBtn = document.querySelector('#modal-no');
let deleteRow = '';

let sortItems = document.querySelectorAll('.sort__item');
sortItems.forEach(item => {
	item.addEventListener('click', sortItemFunc);
});

document.addEventListener('click', e => {
	if (e.target.matches('#modal-no')) {
			modal.classList.remove('show');
	};
});

modalYesBtn.addEventListener('click', () => {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', `../../includes/delete-user.inc.php?username=${user}`);
	xhr.onload = function() {
		if (xhr.response == 'deleted') {
			deleteRow.parentNode.parentNode.parentNode.remove();
		}
	};
	xhr.responseType = 'text';
	showModal();
	xhr.send();
});

function sortItemFunc(e) {
	sortItems.forEach(item => {
		item.classList.remove('desc');
		item.classList.remove('asc');
	});

	let el = e.currentTarget;
	page = 1;

	if (el.dataset.sort === sortby && order === 'ASC') {
		order = 'DESC';
		el.classList.add('desc');
		el.classList.remove('asc');
	} else {
		sortby = el.innerText;
		order = 'ASC';
		el.classList.add('asc');
		el.classList.remove('desc');
	}

	sortby = el.dataset.sort;

	showUser();
}

function pageItemFunc(e) {
	let el = e.currentTarget;
	page = e.currentTarget.dataset.page;

	showUser();
}

function showModal() {
	modal.classList.toggle('show');
}

function deleteUser(username, el) {
	deleteRow = el;
	user = username;
	document.querySelector('.modal__user').innerText = user;
	showModal();
}

// request and shows user list from server

function showUser() {
	let xhr = new XMLHttpRequest();
	xhr.open('GET', `../../includes/get-users.inc.php?page=${page}&sortby=${sortby}&order=${order}`);
	xhr.onload = function() {
		document.querySelector('.users__list').innerHTML = xhr.response;

		let pageItems = document.querySelectorAll('.page__item');
			pageItems.forEach(item => {
			item.addEventListener('click', pageItemFunc);
		});
	
 		let pageArrows = document.querySelectorAll('.page__arrow');
			pageArrows.forEach(item => {
				item.addEventListener('click', pageItemFunc);
		});
	};
	xhr.responseType = 'text';
	xhr.send();
}

showUser();