require('./bootstrap');

import VueSweetAlert from 'vue-sweetalert'

Vue.use(VueSweetAlert);

Vue.prototype.$http = axios;

Vue.component('users-list', require('./components/users/users-list.vue'));
Vue.component('roles-list', require('./components/roles/list.vue'));

const app = new Vue({
    el: '#app'
});
