<template>
    <v-navigation-drawer v-model="drawer" color="#00ACC1#00ACC1" class="rounded-e-xl">
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
  import { ref } from "vue";
  const links = [
    { text: "DASHBOARD", icon: "mdi mdi-home-outline", name: "" },
    { text: "Manage Job Memo", icon: "mdi mdi-controller-classic-outline", name: "jobmemos" },
    { text: "Add Job Memo", icon: "mdi mdi-file-plus", name: "createJobMemo" },
    { text: "REPORTS", icon: "mdi mdi-file-chart-outline", name: "" },
    { text: "STATISTICS", icon: "mdi mdi-chart-pie", name: "" },
    { text: "SETTINGS", icon: "mdi mdi-cog-outline", name: "" },
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
  