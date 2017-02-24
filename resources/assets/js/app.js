require('./bootstrap');

import VueSweetAlert from 'vue-sweetalert'

Vue.use(VueSweetAlert);

Vue.prototype.$http = axios;

Vue.component('datetime-picker', require('./components/common/datetime-picker.vue'));
Vue.component('picture-upload', require('./components/common/picture-upload.vue'));
Vue.component('ckeditor', require('./components/common/ckeditor.vue'));

Vue.component('users-list', require('./components/users/users-list.vue'));
Vue.component('roles-list', require('./components/roles/list.vue'));
Vue.component('passport-dates', require('./components/employees/passport-dates.vue'));
Vue.component('employees-list-filters', require('./components/employees/list-filters.vue'));

const app = new Vue({
    el: '#app'
});
