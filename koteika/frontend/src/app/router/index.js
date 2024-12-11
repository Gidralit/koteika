import { createRouter, createWebHistory } from 'vue-router'
import HomePage from '@/pages/HomePage.vue'
import RegisterPage from "@/pages/RegisterPage.vue";
import CatalogPage from "@/pages/CatalogPage.vue";
import LoginPage from "@/pages/LoginPage.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    { path: '/', name: 'home', component: HomePage },
    { path: '/register', name: 'register', component: RegisterPage },
    { path: '/login', name: 'login', component: LoginPage },
    { path: '/room', name: 'room', component: CatalogPage },
    { path: '/room/:id', name: 'room'}
  ],
})

export default router
