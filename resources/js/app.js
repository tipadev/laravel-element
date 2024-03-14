import './bootstrap';
import { createApp } from 'vue';
import App from '../vue/App.vue';
import ElementPlus from 'element-plus';
import 'element-plus/theme-chalk/dark/css-vars.css';
import 'element-plus/theme-chalk/index.css';
import '../css/app.css';

createApp(App).use(ElementPlus).mount('#app');

