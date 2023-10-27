<template>
    <div>
    <v-toolbar >
      <v-toolbar-title>Quick-Job-Memo</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn> Why I Created Quick Job Memo</v-btn>   
      <v-btn>Trac your Jobs </v-btn>   
      <!--  -->
      <div v-if="user">
          <v-btn> Welcome : {{ user.name}}</v-btn>  
          <v-btn class="bg-primary mr-2">Add New job Memo<Create/><v-icon>mdi mdi-plus</v-icon></v-btn>
          
          <v-btn  @click="handleLogout" class="bg-primary mr-2">Logout<v-icon>mdi mdi-logout</v-icon>
      </v-btn>
      </div>   
      <!--  -->
      <div v-else>
          <v-btn class="bg-primary mr-2" to="/login">
          Login<v-icon>mdi mdi-login</v-icon>
        </v-btn>
        <v-btn class="bg-primary">
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
import Create from '../views/jobMemo/Create.vue';
const {  user,fetchUser, handleLogout} = useAuth()
// console.log(useAuth());
onMounted(()=>{
  fetchUser()
})
// const user = ref(null);

// onMounted(async () => {
//   try {
//     // retrive token from local storage
//     const storedToken = localStorage.getItem('token');

//     if (storedToken) {
//       // Set the stored token in the headers
//       axios.defaults.headers.common['Authorization'] = `Bearer ${storedToken}`;

//       // Retrieve user information
//       const response = await axios.get('user');
//       console.log(response);
//       user.value = response.data.data;
//     }
//   } catch (error) {
//     console.error(error);
//   }
// });

// logout
// const handleLogout = () => {
//   user.value = null;
//   // Remove token from local storage
//   localStorage.removeItem('token');
//   router.push({ name: 'login' });
// };

</script>

<style scoped>

</style>