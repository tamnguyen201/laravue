require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);

// import childcomponents
import routes from './routes';
// import rootcomponents
import App from './components/App.vue';

const router = new VueRouter({
    mode:'history',
    routes
});
new Vue(Vue.util.extend({router},App)).$mount('#app');
//new Vue({
//     router,
//     render: h => h(App)
// }).$mount('#app');


