
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
// Vue.component('tighawid', require('./components/admin/tighawid.vue'));
// Vue.component('departmentpage', require('./components/admin/department.vue'));
// Vue.component('staffpage', require('./components/admin/staff.vue'));
// Vue.component('setting', require('./components/admin/setting.vue'));
// Vue.component('log', require('./components/admin/log.vue'));
// Vue.component('dash', require('./components/admin/dash.vue'));

// Superadmin
Vue.component('tighawid', require('./components/superadmin/tighawid.vue'));
Vue.component('dashad', require('./components/superadmin/dash.vue'));
Vue.component('managedash', require('./components/superadmin/department/dash.vue'));
Vue.component('managep', require('./components/superadmin/personnel/dash.vue'));
Vue.component('manageoff', require('./components/superadmin/offices/dash.vue'));


// registrar area
Vue.component('tighawidreg', require('./components/registrar/tighawid.vue'));
Vue.component('dash-1', require('./components/registrar/dash.vue'));
Vue.component('regstudents', require('./components/registrar/students.vue'));
Vue.component('office', require('./components/registrar/office.vue'));
Vue.component('regrequest', require('./components/registrar/request.vue'));


// instructor area
Vue.component('tighawidins', require('./components/instructor/tighawid.vue'));
Vue.component('dashins', require('./components/instructor/dash.vue'));
Vue.component('insstudents', require('./components/instructor/students.vue'));
Vue.component('insoffice', require('./components/instructor/office.vue'));
Vue.component('insrequest', require('./components/instructor/request.vue'));

//  user area
// Vue.component('tighawiduser', require('./components/user/tighawid.vue'));

// students area
Vue.component('tighawidstu', require('./components/studentsaccount/tighawid.vue'));
Vue.component('dashstu', require('./components/studentsaccount/dash.vue'));
Vue.component('dashreq', require('./components/studentsaccount/request/requestdash.vue'));


// registrar area
Vue.component('rtighawidreg', require('./components/office/registrar/tighawid.vue'));
Vue.component('rdash-1', require('./components/office/registrar/dash.vue'));
Vue.component('rregstudents', require('./components/office/registrar/students.vue'));
Vue.component('roffice', require('./components/office/registrar/office.vue'));
Vue.component('rregrequest', require('./components/office/registrar/request.vue'));

const app = new Vue({
    el: '#app'
});
