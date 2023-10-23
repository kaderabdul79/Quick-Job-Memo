<template>
    <v-layout class="overflow-visible" style="height: 56px;">
      <v-bottom-navigation
        v-model="value"
        color="teal"
        grow
      >
        <v-btn>
          <v-icon>mdi-history</v-icon>
  
          Recents
        </v-btn>
  
        <v-btn>
          <v-icon>mdi-heart</v-icon>
  
          Favorites
        </v-btn>
  
        <v-btn>
          <v-icon>mdi-map-marker</v-icon>
  
          Nearby
        </v-btn>
      </v-bottom-navigation>
      <!-- <v-sheet class="text-center text-subtitle2 text-gray-500">
        <div>Developed by Abdul Kader</div>
      </v-sheet> -->
    </v-layout>
  </template>

<script setup>
import {ref} from 'vue'
const value = ref(1)
</script>

<style scoped>

</style>