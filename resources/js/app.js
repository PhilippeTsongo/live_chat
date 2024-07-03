import './bootstrap';
import { createApp } from 'vue';
import router from './router';

import App from './components/App.vue';
import Users from './components/Users.vue';
import Conversations from './components/Conversations.vue';
import Conversation from './components/Conversation.vue';

const app = createApp(App);

app.use(router);

app.component('users-component', Users);
app.component('conversations-component', Conversations);
app.component('conversation-component', Conversation);

app.mount('#app');
