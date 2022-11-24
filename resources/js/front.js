window.Vue = require('vue');
window.axios = require('axios');
import router from './router';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import App from './views/App.vue';

const app = new Vue({
    el: '#app',
    render: (h) => h(App),
    router: router
});