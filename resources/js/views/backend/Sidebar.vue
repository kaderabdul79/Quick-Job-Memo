<template>
    <v-navigation-drawer v-model="drawer" color="#00ACC1" class="rounded-e-xl">
      <v-sheet color="#00ACC1" class="pa-4 rounded-te-xl text-center">
        <v-progress-circular
          model-value="100"
          color="primary"
          :size="100"
          :width="2"
          class=""
        >
          <v-avatar size="85">
            <v-img src="1.jpg" alt="John"></v-img>
          </v-avatar>
        </v-progress-circular>
  
        <div class="mt-4">Quick Job Memo</div>
        <span class="mb-6 text-caption">jobmemo@gmail.com</span>
      </v-sheet>
  
      <v-list>
        <v-list-item
          v-for="(item, i) in links"
          :key="i"
          :value="item"
          active-class="border"
          :ripple="false"
        >
          <template v-slot:prepend>
            <v-icon :icon="item.icon"></v-icon>
          </template>
  
          <v-list-item-title v-text="item.text"></v-list-item-title>
        </v-list-item>
      </v-list>
      <v-row align="center" class="spacer ml-16 mt-4" no-gutters>
        <v-col cols="4" sm="2" md="1">
          <v-avatar size="36px">
            <v-img alt="Avatar" src="1.jpg"></v-img>
          </v-avatar>
        </v-col>
        <v-col cols="4" sm="2" md="1">
          <v-avatar size="36px">
            <v-img alt="Avatar" src="2.jpg"></v-img>
          </v-avatar>
        </v-col>
        <v-col cols="4" sm="2" md="1">
          <v-avatar size="36px">
            <v-img alt="Avatar" src="3.jpg"></v-img>
          </v-avatar>
        </v-col>
        <v-col cols="4" sm="2" md="1">
          <v-avatar size="36px">
            <v-img alt="Avatar" src="4.jpg"></v-img>
          </v-avatar>
        </v-col>
      </v-row>
      <div style="position: relative; z-index: 9999" class="mt-2">
        <v-img src="map.png" contain max-height="100"></v-img>
      </div>
    </v-navigation-drawer>
  </template>
  
  <script setup>
  import { ref } from "vue";
  const links = [
    { text: "DASHBOARD", icon: "mdi mdi-home-outline" },
    { text: "Manage Job Memo", icon: "mdi mdi-controller-classic-outline" },
    { text: "Add Job Memo", icon: "mdi mdi-file-plus" },
    { text: "REPORTS", icon: "mdi mdi-file-chart-outline" },
    { text: "STATISTICS", icon: "mdi mdi-chart-pie" },
    { text: "SETTINGS", icon: "mdi mdi-cog-outline" },
  ];
  
  const drawer = ref(null);
  </script>
  
  <script>
  export default {
    data: () => ({
      cards: ["Today", "Yesterday"],
      drawer: null,
    }),
  };
  </script>
  <style scoped></style>
  