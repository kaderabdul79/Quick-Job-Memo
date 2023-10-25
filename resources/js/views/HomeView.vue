<template>
<v-card>
<SiteHeader />
<div v-if="user">
      <p>User Information:</p>
      <ul>
        <li>Email: {{ user.email }}</li>
      </ul>
    </div>
    <div v-else>
      <p>No user information available.</p>
    </div>
<Sitecarousal />
<SiteFooter />
</v-card>
</template>

<script setup>
import SiteFooter from '../components/SiteFooter.vue';
import SiteHeader from '../components/SiteHeader.vue';
import Sitecarousal from '../components/sitecarousal.vue';

import { ref, onMounted } from 'vue';
import axios from 'axios';
axios.defaults.baseURL = "http://127.0.0.1:8000/api/";

const user = ref(null);

onMounted(async () => {
  try {
    // retrive token from local storage
    const storedToken = localStorage.getItem('token');

    if (storedToken) {
      // Set the stored token in the headers
      axios.defaults.headers.common['Authorization'] = `Bearer ${storedToken}`;

      // Retrieve user information
      const response = await axios.get('user');
      console.log(response);
      user.value = response.data.data;
    }
  } catch (error) {
    console.error(error);
  }
});

</script>

<style scoped>

</style>