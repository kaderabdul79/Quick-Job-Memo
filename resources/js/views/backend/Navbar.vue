<template>
        <v-app-bar class="px-2" :elevation="2" background="#26A69A">
            <div class="my-header w-100 d-flex justify-space-end" background="#26A69A">
            <v-spacer></v-spacer>
            <div class="profile">
                <v-avatar size="36px">
                    <v-img
                        alt="Avatar"
                        src="https://avatars0.githubusercontent.com/u/9064066?v=4&s=460"
                    ></v-img>
                </v-avatar>
                <span class="ml-2 subtitle-2">Abdul Kader</span>
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
                            title="Users Profile"
                            value="users"
                        ></v-list-item>
                        <v-list-item
                            prepend-icon="mdi mdi-logout"
                            title="Logout"
                            value="Logout"
                        ></v-list-item>
                    </v-list>
                </v-menu>
            </div></div>
        </v-app-bar>
</template>

<script setup>

</script>

<style scoped>

</style>