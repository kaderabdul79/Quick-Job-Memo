<script setup>
import { RouterView } from 'vue-router'
import {ref} from 'vue'
import SiteFooter from './components/SiteFooter.vue';

const items = ref([
        { text: 'My Files', icon: 'mdi-folder' },
        { text: 'Shared with me', icon: 'mdi-account-multiple' },
        { text: 'Starred', icon: 'mdi-star' },
        { text: 'Recent', icon: 'mdi-history' },
        { text: 'Offline', icon: 'mdi-check-circle' },
        { text: 'Uploads', icon: 'mdi-upload' },
        { text: 'Backups', icon: 'mdi-cloud-upload' },
      ])
</script>

<template>
  <v-app id="my-app">
    <!-- <v-app-bar scroll-behavior="hide elevate" scroll-threshold="1000">
      <div class="logo">Quick Job Memo</div>
        <v-spacer></v-spacer>
      <div class="menu bg-red">
        <v-list>
          <v-list-item icon="mdi-menu-down">Home</v-list-item>
          <v-list-item icon="mdi-menu-down">Job List</v-list-item>
          <v-list-item icon="mdi-menu-down">Register</v-list-item>
          <v-list-item icon="mdi-menu-down">Login</v-list-item>
        </v-list>
      </div>
    </v-app-bar> -->
    <div>
    <v-toolbar >
      <v-toolbar-title>Quick-Job-Memo</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn>
        Why I Created Quick Job Memo
      </v-btn>   
      <v-btn>
        Trac your Jobs
      </v-btn>      
      <v-btn class="bg-primary mr-2">
        Add New job Memo<v-icon>mdi mdi-plus</v-icon>
      </v-btn>
      <v-btn class="bg-primary mr-2">
        Login<v-icon>mdi mdi-login</v-icon>
      </v-btn>
      <v-btn class="bg-primary">
        Register<v-icon>mdi mdi-account-plus-outline</v-icon>
      </v-btn>
    </v-toolbar>
  </div>
    <!--  -->
    <v-main no-gutters>
      <RouterView />
    </v-main>
    <!-- footer -->
    <SiteFooter />
  </v-app>
</template>

<style scoped>
v-btn{
  margin-left: 10px;
}
</style>
