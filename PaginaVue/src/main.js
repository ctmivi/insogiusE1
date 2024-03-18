import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import '@/assets/bootstrap.min.css'
import 'PaginaVue/src/assets/bootstrap.bundle.min.js'  

createApp(App).use(store).use(router).mount('#app')
