<script setup>
import { RouterView } from 'vue-router'
import {ref} from 'vue'

</script>

<template>
  <v-app id="my-app">
    <v-main no-gutters>
      <RouterView />
    </v-main>
  </v-app>
</template>

<style scoped>
v-btn{
  margin-left: 10px;
}
</style>
