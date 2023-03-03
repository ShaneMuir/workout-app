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


(() => {
    'use strict'

    const storedTheme = localStorage.getItem('theme')
    const sunBtn = document.getElementById('sunBtn')
    const moonBtn = document.getElementById('moonBtn')

    const getPreferredTheme = () => {
        if (storedTheme) {
            return storedTheme
        }

        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
    }

    if (getPreferredTheme() === 'dark') {
        moonBtn.classList.add('active')
    }

    if (getPreferredTheme() === 'light') {
        sunBtn.classList.add('active')
    }

    if (!storedTheme) {
        localStorage.setItem('theme', getPreferredTheme())
    }

    document.body.setAttribute('data-bs-theme', storedTheme || getPreferredTheme())

    sunBtn.addEventListener('click', (e) => {
        e.preventDefault()
        sunBtn.classList.add('active')
        sunBtn.classList.add('text-white')
        moonBtn.classList.remove('active')
        document.body.setAttribute('data-bs-theme', 'light')
        localStorage.setItem('theme', 'light')
    })

    moonBtn.addEventListener('click', (e) => {
        e.preventDefault()
        moonBtn.classList.add('active')
        sunBtn.classList.remove('active')
        sunBtn.classList.remove('text-white')
        document.body.setAttribute('data-bs-theme', 'dark')
        localStorage.setItem('theme', 'dark')
    })
})()

document.querySelectorAll('.collapse').forEach(collapse => {
    collapse.addEventListener('show.bs.collapse', () => {
        document.querySelectorAll('.collapse.show').forEach(show => {
            if (show !== collapse) {
                show.classList.remove('show')
            }
        })
    })
})

let exerciseCount = 1 // already got a set there with [0]
const exercisesContainer = document.getElementById('exercisesContainer')
const addExerciseBtn = document.querySelectorAll('.add-exercise')

function addExercise() {
    const exerciseMarkup = `
      <div class="form-group row">
        <div class="col">
          <div class="d-flex align-items-center justify-content-between">
            <label for="name-${exerciseCount}" class="col-form-label text-md-right">Exercise Name</label>
            <a id="removeExercise-${exerciseCount}" href ><img src="/assets/remove.svg" width="16" height="16" alt="remove icon"></a>
        </div>
          <input id="name-${exerciseCount}" placeholder="Exercise Name" type="text" class="form-control" name="exercises[${exerciseCount}][name]" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col">
          <label for="sets-${exerciseCount}" class="col-form-label text-md-right">Sets</label>
          <input id="sets-${exerciseCount}" placeholder="Sets" type="number" min="1" class="form-control" name="exercises[${exerciseCount}][sets]" required>
        </div>
        <div class="col">
          <label for="reps-${exerciseCount}" class="col-form-label text-md-right">Reps</label>
          <input id="reps-${exerciseCount}" placeholder="Reps" type="number" min="1" class="form-control" name="exercises[${exerciseCount}][reps]" required>
        </div>
        <div class="col">
          <label for="weight-${exerciseCount}" class="col-form-label text-md-right">Weight</label>
          <input id="weight-${exerciseCount}" placeholder="Weight" type="number" min="0" step="0.01" class="form-control" name="exercises[${exerciseCount}][weight]" required>
        </div>
      </div>
    `
    const exerciseDiv = document.createElement('div')
    exerciseDiv.classList.add('exercise-field-wrapper')
    exerciseDiv.innerHTML = exerciseMarkup
    exercisesContainer.appendChild(exerciseDiv)
    exerciseCount++


    const removeExerciseBtn = exerciseDiv.querySelector(`#removeExercise-${exerciseCount - 1}`)
    removeExerciseBtn.addEventListener('click', (e) => {
        e.preventDefault()
        exerciseDiv.remove()
        exerciseCount--
    })
}

    if(addExerciseBtn) {
        addExerciseBtn.forEach((button) => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                addExercise();
            });
        });
    }

    const toast = document.querySelector('.toast')
    if(toast) {
        setTimeout(function() {
            toast.classList.remove('show')
        }, 5000)
    }

})
