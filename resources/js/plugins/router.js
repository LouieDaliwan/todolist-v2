import {createRouter, createWebHashHistory} from 'vue-router';

import Dashboard from '../Pages/Dashboard.vue';
import PrivacyPolicy from '../Pages/PrivacyPolicy.vue';
import TermsOfService from '../Pages/TermsOfService.vue';

// vue.use(createRouter);

const routes = [
    { path: '/', component: Dashboard },
    { path: '/privacy-policy', component: PrivacyPolicy },
    { path: '/terms-of-service', component: TermsOfService },
];

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
});


export default router;
