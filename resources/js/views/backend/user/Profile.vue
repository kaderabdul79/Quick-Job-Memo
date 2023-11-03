<template>
    <div class="profile">
        <v-container fluid>
            <v-row>
                <v-col cols="6" md="6" xs="12">
                  <v-sheet v-if="user" class="pa-4 border rounded-xl text-center">
                    <v-progress-circular
                      model-value="100"
                      color="primary"
                      :size="100"
                      :width="2"
                      class=""
                    >
                      <v-avatar size="85">
                        <v-img src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460" alt="John"></v-img>
                      </v-avatar>
                    </v-progress-circular>
  
                    <div class="mt-4">{{ user.name }}</div>
                    <div class="">{{ user.email }}</div>
                    <span class="mb-6 text-caption bg-blue pa-1">Software Engineer</span>
                    <div class="text-subtitle1 px-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid quaerat excepturi et laborum ea non impedit iste eum aspernatur saepe.</div>
                    <v-card-title>Job Memo Overview</v-card-title>

                    <div class="px-4">
                        <v-chip-group v-model="selection">
                            <v-chip>20 Available Job</v-chip>

                            <v-chip>Called for Interview 17</v-chip>

                            <v-chip>Interview Attended 14</v-chip>

                            <v-chip>Expire 2</v-chip>
                        </v-chip-group>
                    </div>
                  </v-sheet>
                  <div v-else class="loading-spinner">
                    <v-progress-circular  color="#00ACC1" indeterminate :size="80" :width="5"></v-progress-circular>
                </div>
                </v-col>
                <v-col cols="6" md="6" xs="12">
                  Update profile
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import { ref,onMounted } from "vue";
const isLoading = ref(true)   
import useAuth from '@/composables/useAuth.js'
const {  user,fetchUser, handleLogout} = useAuth()

onMounted(()=>{
  fetchUser()
}) 
</script>

<style scoped>
.border{
  border: 2px solid #42a5f5;
}
</style>