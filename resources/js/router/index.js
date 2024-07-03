import { createRouter, createWebHistory } from 'vue-router';
import Users from '../components/Users.vue';
import Conversations from '../components/Conversations.vue';
import Conversation from '../components/Conversation.vue';

const routes = [
  { path: '/', component: Users },
  { path: '/conversations', component: Conversations },
  { path: '/conversations/:id', component: Conversation }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
