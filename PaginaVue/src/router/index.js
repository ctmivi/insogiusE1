import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginForm from '../views/LoginForm.vue'
import RegistrationForm from '../views/RegistrationForm.vue'
import PerfilView from '../views/PerfilView.vue'
import TiendaView from '@/views/TiendaView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'LoginForm',
    component: LoginForm
  },
  {
    path: '/register',
    name: 'RegistrationForm',
    component: RegistrationForm
  },
  {
    path: '/perfil',
    name: 'PerfilView',
    component: PerfilView
  },
  {
    path: '/tienda',
    name: 'TiendaView',
    component: TiendaView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
