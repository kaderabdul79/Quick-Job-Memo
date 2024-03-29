import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
// 
function isAuthenticated() {
  const token = localStorage.getItem('token');
  return token && token.length > 0;
}

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
      component: () => import("../views/Login.vue"),
      // if user already login and mistakenly request for login redirect to dashboard
      beforeEnter: (to, from, next) => {
        isAuthenticated() ? next({ name: 'dashboard' }) : next();
      },
    },
    {
      path: "/register", 
      name: 'register',
      component: () => import("../views/Registration.vue"),
       // if user already register and mistakenly request for register redirect to dashboard
      beforeEnter: (to, from, next) => {
        isAuthenticated() ? next({ name: 'dashboard' }) : next();
      },
    },
    {
      path: "/dashboard",
      name: "dashboard",
      redirect: {name: 'dashboardOverview'},
      component: () => import("../views/backend/Dashboard.vue"),
      // if token is available, can access all the children route, if not redirect to login
      beforeEnter: (to, from, next) => {
        if (isAuthenticated()) {
          next();
        } else {
          next({ name: 'login' });
        }
      },
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
        // user
        { 
          path: "user", 
          name: 'user',
          component: () => import("../views/backend/user/User.vue") ,
          redirect: {name: 'profile'},
          children: [
            {
              path: "profile", 
              name: 'profile',
              component: () => import("../views/backend/user/Profile.vue") ,
            }
          ],
        },
        // statistics
        { 
          path: "jobmemos/statistics", 
          name: 'jobmemosStatistics',
          component: () => import("../views/backend/StatisticsJobMemos.vue") 
        },
      ]
    }
  ]
})

export default router
