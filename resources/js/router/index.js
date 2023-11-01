import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    { 
      path: "/login", 
      name: 'login',
      component: () => import("../views/Login.vue") 
    },
    {
      path: "/dashboard",
      name: "dashboard",
      component: () => import("../views/backend/Dashboard.vue"),
      children: [
        {
          path: '',
          name: 'dashboardOverview',
          component: () => import('../views/backend/Overview.vue'),
        },
        { 
          path: "jobmemos", 
          name: 'jobmemos',
          component: () => import("../views/backend/jobMemo/JobMemo.vue") 
        },
        { 
          path: "jobmemos/create", 
          name: 'createJobMemo',
          component: () => import("../views/backend/jobMemo/Create.vue") 
        },
        { 
          path: "jobmemos/:id/edit", 
          name: 'editJobMemo',
          props: true,
          component: () => import("../views/backend/jobMemo/Edit.vue") 
        },
      ]
    }
  ]
})

export default router
