import vue from 'vue';
import Router from 'vue-router';


import Dashboard from '../Pages/Dashboard.vue'

const routes = [
    { path: '/', component: Dashboard}
];


const router = Router.createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: Router.createWebHashHistory(),
    routes, // short for `routes: routes`
  })


export default router;
