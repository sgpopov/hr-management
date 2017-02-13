require('./bootstrap');

import VueSweetAlert from 'vue-sweetalert'

Vue.use(VueSweetAlert);

Vue.prototype.$http = axios;

// Vue.component('users-list', require('./components/users/users-list.js'));
Vue.component('users-list', require('./components/users/users-list.vue'));
// Vue.component('users-list-item', require('./components/users/users-list-item.vue'));

const app = new Vue({
    el: '#app'
});
