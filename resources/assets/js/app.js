
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var Vue =require('vue');
Vue.use(require('vue-resource'));
Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// testing area
Vue.component('test',require('./components/test.vue'));
Vue.component('inputhead', require('./components/Input.vue'));
Vue.component('message', require('./components/Message.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));

// testing area exit


// department area
// Vue.component('new-department', require('./components/deparment/new-department.vue'));
// Vue.component('view-department', require('./components/deparment/view-department.vue'));
// Vue.component('new-staff', require('./components/deparment/new-staff.vue'));



// homepage area
Vue.component('loginarea', require('./components/homepage/loginarea.vue'));


// admin area
Vue.component('tighawid', require('./components/admin/tighawid.vue'));
Vue.component('departmentpage', require('./components/admin/department.vue'));
Vue.component('staffpage', require('./components/admin/staff.vue'));
Vue.component('setting', require('./components/admin/setting.vue'));
Vue.component('log', require('./components/admin/log.vue'));
Vue.component('dash', require('./components/admin/dash.vue'));


// registrar area
Vue.component('tighawidreg', require('./components/registrar/tighawid.vue'));
Vue.component('dash-1', require('./components/registrar/dash.vue'));
Vue.component('regstudents', require('./components/registrar/students.vue'));


// instructor area
Vue.component('tighawidins', require('./components/instructor/tighawid.vue'));
Vue.component('dash1', require('./components/instructor/dash.vue'));


const app = new Vue({
    el: '#app'
});
