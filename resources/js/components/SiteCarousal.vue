<template>
    <v-carousel
      cycle
      height="400"
      hide-delimiter-background
      show-arrows="hover"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
      >
        <v-sheet
          :color="colors[i]"
          height="100%"
        >
          <div class="w-50 mx-auto text-center py-5">
            <div class="text-h2 pt-5">
              {{ slide }} Slide
            </div>
            <div class="text-body1">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. .
            </div>
            <v-btn> Why I Created Quick Job Memo </v-btn> 
          </div>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </template>

<script setup>
import {ref} from 'vue'
const colors = ref([
          'indigo',
          'warning',
          'pink darken-2',
          'red lighten-1',
          'deep-purple accent-4',
        ])
const slides = ref([
          'First',
          'Second',
          'Third',
          'Fourth',
          'Fifth',
        ])        
</script>

<style scoped>

</style>