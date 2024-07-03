<template>
    <div>
      <h1>Conversation</h1>
      <ul>
        <li v-for="message in conversation.messages" :key="message.id">{{ message.message }}</li>
      </ul>
      <input v-model="newMessage" @keyup.enter="sendMessage">
      <input type="file" @change="handleFileUpload">
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        conversation: {},
        newMessage: '',
        file: null
      };
    },
    created() {
      axios.get('/api/conversations/' + this.$route.params.id)
        .then(response => {
          this.conversation = response.data;
        });
  
      window.Echo.private('conversation.' + this.$route.params.id)
        .listen('MessageSent', (e) => {
          this.conversation.messages.push(e.message);
        });
    },
    methods: {
      sendMessage() {
        let formData = new FormData();
        formData.append('conversation_id', this.$route.params.id);
        formData.append('receiver_id', this.conversation.receiver_id);
        formData.append('message', this.newMessage);
        if (this.file) {
          formData.append('file', this.file);
        }
  
        axios.post('/api/messages', formData)
          .then(response => {
            this.newMessage = '';
            this.file = null;
          });
      },
      handleFileUpload(event) {
        this.file = event.target.files[0];
      }
    }
  }
  </script>
  