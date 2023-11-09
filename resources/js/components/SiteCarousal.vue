<template>
    <v-carousel
      cycle
      height="600"
      hide-delimiter-background
      show-arrows="hover"
    >
      <v-carousel-item  v-for="(slide, i) in slides" :key="i">
        <v-sheet
          :color="colors[i]"
          height="100%"
        >
          <div class="text-center down-below">
            <div class="text-h3">{{ slide }} </div> <br>
            <div>
              <v-btn color="primary mr-2" to="login"> Login </v-btn>
              <v-btn color="secondary" to="register"> Register </v-btn>
            </div>
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
          'Streamlined Job Tracking',
          'Effortless Application Management',
          'Stay Informed and Proactive',
        ])        
</script>

<style scoped>
.down-below{
  padding-top: 220px;
}
</style>