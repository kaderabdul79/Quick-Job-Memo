<template>
    <div>
        <v-container id="section1">
            <v-row>
                <v-col>
                    <TitleSection>Why I created Job Memo?</TitleSection>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                <v-expansion-panels variant="accordion">
                    <v-expansion-panel v-for="(item, index) in accordion" :key="index" :title="item.question" :text="item.answer">
                    </v-expansion-panel>
                </v-expansion-panels>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import {ref} from 'vue'
import TitleSection from './TitleSection.vue';
const accordion = ref([
        { id:1, question: "What's the main purpose behind JobMemo?", answer: "JobMemo is designed to help users personalize their job search by tracking and managing important details like job titles, interview dates, tech stack, and experiences."},
        { id:2, question: "Why did I feel the need for JobMemo in the job search landscape?", answer: "People often miss out on opportunities or forget essential details during job searches. JobMemo addresses this by providing a personalized platform to keep track of applications, interviews, and deadlines." },
        { id:3, question: "How does JobMemo differentiate itself from other job search portals?", answer: "Unlike traditional job platforms, JobMemo focuses on personalization. It allows users to record brief notes about each job, ensuring they don't miss application deadlines or forget crucial details." },
        { id:4, question: "How JobMemo ensures effective management of job applications?", answer: "JobMemo serves as a personal job tracker, letting users input details like job titles, interview dates, tech stacks, and experiences. It sends timely notifications, alerting users when application deadlines are approaching." },
        { id:5, question: " What are the standout features of JobMemo that enhance the overall job search experience?", answer: "JobMemo stands out for its simplicity. It's not just about finding jobs but tailoring your search. Users can take quick notes, manage applications, and receive notifications, ensuring an organized and focused job search experience." },
      ],)
</script>

<style scoped>

</style>