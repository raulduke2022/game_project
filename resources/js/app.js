import './bootstrap';
// import '../sass/app.scss';

import {createApp} from 'vue';

import router from "./router.js"
import store from "./store/index.js";

import App from "./App.vue"

import GameButton from './components/ui/GameButton.vue';
import BaseBadge from './components/ui/BaseBadge.vue';
import BaseSpinner from './components/ui/BaseSpinner.vue';
import BaseDialog from './components/ui/BaseDialog.vue';
import Navbar from "@/components/ui/Navbar.vue";

const app = createApp({});

app.component('app', App);

app.component('game-button', GameButton);
app.component('base-badge', BaseBadge);
app.component('base-spinner', BaseSpinner);
app.component('base-dialog', BaseDialog);
app.component('nav-bar', Navbar);

app.use(router)
app.use(store)

app.mount('#app');
