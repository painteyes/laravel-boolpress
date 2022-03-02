/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


function showEditProfileForm() {
	let completedInfo  = document.getElementById('completed-info');
	completedInfo.classList.remove('show');
	completedInfo.classList.add('hidden');

    let form = document.getElementById('edit-profile-form');
	form.classList.remove('hidden');
	form.classList.add('show');
}

