import { createRouter, createWebHistory } from 'vue-router';
import UserList from '@/views/UserList.vue'; 
import UserCreate from '@/views/UserCreate.vue';
import UserSettings from '@/views/UserSettings.vue';

const routes = [
  {
    path: '/',
    name: 'users',
    component: UserList, 
  },
  {
    path: '/criar', 
    name: 'criar',
    component: UserCreate,
  },
  {
    path: '/alterar', 
    name: 'alterar',
    component: UserSettings,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
