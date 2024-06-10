require('./bootstrap');

import { createApp } from 'vue';

const app = createApp({});

app.component('app', require('./components/App.vue').default);

app.mount('#app');



