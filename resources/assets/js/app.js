import "babel-polyfill";

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('modal',                   require('./components/shared/Modal.vue'));
Vue.component('datePicker',              require('./components/shared/DatePicker.vue'));
Vue.component('ForgotPassword',          require('./components/authentication/ForgotPassword.vue'));

Vue.directive('focus', {
    inserted: function (el) {
        el.focus()
    }
});

const app = new Vue({
    el: '#app',
    data() {
        return {
            showModal: false
        }
    }
});

$("form").submit(() => {
    $("#submit").addClass("is-loading");
    return true;
});

setTimeout(() => {
    $('#is-popUp').fadeOut('fast');
}, 3500);