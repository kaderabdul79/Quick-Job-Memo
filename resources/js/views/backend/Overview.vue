<template>
    <div id="overview">
        <v-container fluid>
            <v-row v-if="user">
                <v-col>
                <v-sheet class="bg-grey-lighten-3 py-5 pl-2 text-blue-lighten-1 rounded border-left-5 text--primary" :elevation="3">
                    <div class="text-h6 text-uppercase">Available Job</div>
                    <span class="text-h4">{{ jobMemoOverview.totalJobMemos }}</span>
                </v-sheet>
                </v-col>
                <v-col>
                <v-sheet class="bg-grey-lighten-3 py-5 pl-2 bl-2-red text-deep-purple-accent-1 rounded border-left-5 text--primary" :elevation="3">
                    <div class="text-h6 text-uppercase">Got Interview call</div>
                    <span class="text-h4">{{ jobMemoOverview.interviewCalled }}</span>
                </v-sheet>
                </v-col>
                <v-col>
                <v-sheet class="bg-grey-lighten-3 py-5 pl-2 bl-2-red text-blue-lighten-1 rounded border-left-5 text--primary" :elevation="3">
                    <div class="text-h6 text-uppercase">Interview Attended</div>
                    <span class="text-h4">{{ jobMemoOverview.interviewAttended }}</span>
                </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </div></template>

<script setup>
import {ref, onMounted} from 'vue'
import useAuth from '@/composables/useAuth.js'
const { user,fetchUser, handleLogout} = useAuth()
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const jobMemoOverview = ref({})
// jobMemoOverview
function jobmemoOverview(){
  axios.get('jobMemoOverview')
    .then(response => {
      console.log(response.data)
      jobMemoOverview.value = response.data?.data
    })
    .catch(error => {
      console.error("Error", error);
    });
}
console.log(user);
onMounted(()=>{
    fetchUser()
    jobmemoOverview()
})
</script>

<style scoped>

</style>