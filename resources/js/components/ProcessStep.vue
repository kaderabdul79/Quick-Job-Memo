<template>
<v-container id="section2">
    <v-row>
         <v-col>
            <TitleSection>Process of Job Memo</TitleSection>
         </v-col>
    </v-row>
    <v-row>
        <v-col cols="12" xs="6">
            <v-stepper :items="items">
            <template v-for="item in items" v-slot:[`item.${item.id}`] :key="item.id">
                <v-card :title="item.title" flat>
                    <p class="ml-4">{{ item.description }}</p>
                </v-card>
            </template>
        </v-stepper>
        </v-col>
    </v-row>
</v-container>
</template>

<script setup>
import {ref} from 'vue'
import TitleSection from './TitleSection.vue';
const items = ref([
    {id: 1,title: "Streamlined Job Tracking",description: "Easily add and organize job memos, consolidating essential details for each opportunity in one place."},
    {id: 2,title: "Effortless Application Management",description: "Keep track of application statuses and deadlines, ensuring a well-managed and organized job search."},
    {id: 3,title: "Stay Informed and Proactive",description: "Stay informed about application updates, making informed decisions and staying ahead in your job search journey."},
])
</script>

<style scoped>

</style>