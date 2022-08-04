import {createRouter, createWebHistory} from 'vue-router';

import Home from '../Pages/Home.vue';
import Inbox from '../Pages/Inbox.vue';
import MyTasks from '../Pages/MyTasks.vue';

// vue.use(createRouter);

const routes = [
    { path: '/home', component: Home },
    { path: '/inbox', component: Inbox },
    { path: '/my-tasks', component: MyTasks },
];

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
});


export default router;
