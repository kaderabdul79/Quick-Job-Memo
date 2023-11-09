<template>
    <div>
    <v-toolbar >
      <v-toolbar-title>Quick-Job-Memo</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn @click="scrollToSection('section1')"> Why I Created Quick Job Memo</v-btn>   
      <v-btn @click="scrollToSection('section2')">Process of Job Memo</v-btn>   
      <!--  -->
      <div v-if="user">
          <v-btn class="bg-primary mr-2" to="/dashboard">Dashboard</v-btn> 
          <v-btn class="bg-primary mr-2">Add New job Memo<Create/><v-icon>mdi mdi-plus</v-icon></v-btn>
          <v-btn  @click="handleLogout" class="bg-primary mr-2">Logout<v-icon>mdi mdi-logout</v-icon>
      </v-btn>
      </div>   
      <!--  -->
      <div v-else>
          <v-btn class="bg-primary mr-2" :to="{name: 'login'}">
          Login<v-icon>mdi mdi-login</v-icon>
        </v-btn>
        <v-btn class="bg-primary" :to="{name: 'register'}">
          Register<v-icon>mdi mdi-account-plus-outline</v-icon>
        </v-btn>
      </div>
    </v-toolbar>
  </div>
</template>

<script setup>
import { ref, onMounted, defineEmits } from 'vue';
import axios from 'axios';
axios.defaults.baseURL = "http://127.0.0.1:8000/api/";
import useAuth from '@/composables/useAuth.js'
const {  user,fetchUser, handleLogout} = useAuth()
import Create from '../views/jobMemo/Create.vue';
onMounted(()=>{
  fetchUser()
})

// add scroll in header
const scrollToSection = (sectionId) => {
  document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
};

</script>

<style scoped>

</style>