require('./bootstrap');

import VueSweetAlert from 'vue-sweetalert'

Vue.use(VueSweetAlert);

Vue.prototype.$http = axios;

Vue.component('datetime-picker', require('./components/common/datetime-picker.vue'));

Vue.component('users-list', require('./components/users/users-list.vue'));
Vue.component('roles-list', require('./components/roles/list.vue'));
Vue.component('passport-dates', require('./components/employees/passport-dates.vue'));

const app = new Vue({
    el: '#app'
});
