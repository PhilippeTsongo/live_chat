<template>
    <div>
      <h1>Users</h1>
      <ul>
        <li v-for="user in users" :key="user.id">{{ user.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        users: []
      };
    },
    created() {
      axios.get('/api/users')
        .then(response => {
          this.users = response.data;
        });
    }
  }
  </script>
  