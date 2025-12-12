import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CategoryView from '../views/CategoryView.vue'
import ProductView from '../views/ProductView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
    },
   
    {
      path: "/Categories/:categoryId",
      name: "Category",
      component: () => import("../views/CategoryView.vue"),
    },
    {
      path: "/products/:productId",
      name: "product",
      component: () => import("../views/ProductView.vue"),
    },
    
   

   
  ],
})

export default router
