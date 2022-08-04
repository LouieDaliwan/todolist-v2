import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import router from './plugins/router';

import App from './App.vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


createApp(App)
.use(router)
.mount('#app');
