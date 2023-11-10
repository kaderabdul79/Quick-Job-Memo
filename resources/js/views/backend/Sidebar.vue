<template>
    <v-navigation-drawer v-model="drawer" color="primary" class="rounded-e-xl">
      <v-sheet color="primary" class="pa-4 rounded-te-xl text-center" v-if="user">
        <v-progress-circular
          model-value="100"
          color="secondary"
          :size="100"
          :width="2"
          class=""
        >
          <v-avatar size="85">
            <v-img alt="Avatar" src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"></v-img>
          </v-avatar>
        </v-progress-circular>
  
        <div class="mt-4">Quick Job Memo</div>
        <span class="mb-6 text-caption">{{ user.email }}</span>
      </v-sheet>
  
      <v-list>
        <v-list-item
          v-for="(item, i) in links"
          :key="i"
          :value="item"
          active-class="border"
          :ripple="false"
          :to="{name: item.name}"
        >
          <template v-slot:prepend>
            <v-icon :icon="item.icon"></v-icon>
          </template>
  
          <v-list-item-title v-text="item.text"></v-list-item-title>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </template>
  
  <script setup>
  import { ref,onMounted } from "vue";
const isLoading = ref(true)   

import useAuth from '@/composables/useAuth.js'
const {  user,fetchUser, handleLogout} = useAuth()

const links = [
    { text: "DASHBOARD", icon: "mdi mdi-home-outline", name: "" },
    { text: "Manage Job Memo", icon: "mdi mdi-controller-classic-outline", name: "jobmemos" },
    { text: "Add Job Memo", icon: "mdi mdi-file-plus", name: "createJobMemo" },
    { text: "STATISTICS", icon: "mdi mdi-chart-pie", name: "jobmemosStatistics" },
    { text: "SETTINGS", icon: "mdi mdi-cog-outline", name: "" },
  ];
 
onMounted(()=>{
  fetchUser()
}) 
const drawer = ref(null);
  </script>
  
  <style scoped></style>
  