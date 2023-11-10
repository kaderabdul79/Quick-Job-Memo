<template>
        <v-app-bar class="px-2" :elevation="2" background="#26A69A">
            <div class="my-header w-100 d-flex justify-space-end" background="#26A69A">
            <v-spacer></v-spacer>
            <div class="profile" v-if="user">
                <v-avatar size="36px">
                    <v-img :src="user?.picture ? `http://localhost:8000/storage/profile_picture/${user.picture}` : 'https://avatars0.githubusercontent.com/u/9064066?v=4&s=460'" alt="profile picture"></v-img>
                </v-avatar>
                <span class="ml-2 subtitle-2">{{ user.name }}</span>
                <!--  -->
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-btn
                            size="small"
                            variant="text"
                            icon="mdi-menu-down"
                            :ripple="false"
                            v-bind="props"
                        ></v-btn>
                    </template>
                    <v-list>
                        <v-list-item
                            prepend-icon="mdi-account"
                            title="User Profile"
                            value="user"
                            :to="{name: 'profile'}"
                        ></v-list-item>
                        <v-list-item
                            prepend-icon="mdi mdi-logout"
                            title="Logout"
                            value="Logout"
                            @click="handleLogout"
                        ></v-list-item>
                    </v-list>
                </v-menu>
            </div></div>
        </v-app-bar>
</template>

<script setup>
import { onMounted } from 'vue';

import useAuth from '@/composables/useAuth.js'
const {  user,fetchUser, handleLogout} = useAuth()
onMounted(()=>{
  fetchUser()
})
</script>

<style scoped>

</style>