/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
// import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

// const app = createApp({});
//
// import ExampleComponent from './components/ExampleComponent.vue';
// app.component('example-component', ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

// app.mount('#app');

window.addEventListener('DOMContentLoaded', () => {
    const editProfileBtn = document.getElementById('editProfileBtn')
    const dontEditProfileBtn = document.getElementById('dontEditProfileBtn')
    const nameField = document.getElementById('name')
    const emailField = document.getElementById('email')
    const avatarField = document.getElementById('avatar')
    const saveBtn = document.getElementById('saveBtn')

    if (editProfileBtn) {
        editProfileBtn.addEventListener('click', (e) => {
            e.preventDefault()
            dontEditProfileBtn.classList.toggle('d-none')
            dontEditProfileBtn.classList.toggle('d-block')
            editProfileBtn.classList.toggle('d-none')
            nameField.disabled = false
            emailField.disabled = false
            avatarField.disabled = false
            saveBtn.disabled = false
        })
    }

    if (dontEditProfileBtn) {
        dontEditProfileBtn.addEventListener('click', (e) => {
            e.preventDefault()
            editProfileBtn.classList.toggle('d-none')
            dontEditProfileBtn.classList.toggle('d-none')
            dontEditProfileBtn.classList.toggle('d-block')
            nameField.disabled = true
            emailField.disabled = true
            avatarField.disabled = true
            saveBtn.disabled = true
        })
    }
});
