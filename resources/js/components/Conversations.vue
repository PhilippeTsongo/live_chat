<template>
    <div>
      <h1>Conversations</h1>
      <ul>
        <li v-for="conversation in conversations" :key="conversation.id">
          <router-link :to="'/conversations/' + conversation.id">Conversation {{ conversation.id }}</router-link>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        conversations: []
      };
    },
    created() {
      axios.get('/api/conversations')
        .then(response => {
          this.conversations = response.data;
        });
    }
  }
  </script>
  