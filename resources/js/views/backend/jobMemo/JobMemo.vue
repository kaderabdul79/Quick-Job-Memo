<template>
    <div id="jobmemos">  
        <v-container fluid>
            <v-row>
                <v-col cols="12" md="12" xs="6">
                    <v-sheet class="d-flex justify-space-between mb-2">
                        <h2 class="">List of Job Memos</h2>
                        <div><v-btn :to="{name: 'createJobMemo'}" color="#00ACC1" class="">Add New</v-btn></div>
                    </v-sheet>
                    <v-table
                    fixed-header
                    height="600px"
                >
                    <thead class="">
                    <tr>
                        <th class="text-center">
                            Id
                        </th>
                        <th class="text-center">
                            Job Ttile
                        </th>
                        <th class="text-center">
                            Deadline
                        </th>
                        <th class="text-center">
                            Tech Stack
                        </th>
                        <th class="text-center">
                            Experience
                        </th>
                        <th class="text-center">
                            Location
                        </th>
                        <th class="text-center">
                            Interview Attended

                        </th>
                        <th class="text-center">
                            Interview Called
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr
                        v-for="jobmemo in jobmemos"
                        :key="jobmemo.id"
                    > 
                        <td>{{ jobmemo.id }}</td>
                        <td>{{ jobmemo.job_title }}</td>
                        <td>{{ jobmemo.deadline }}</td>
                        <td>{{ jobmemo.tech_stack }}</td>
                        <td>{{ jobmemo.experience }}</td>
                        <td>{{ jobmemo.location }}</td>
                        <td>{{ jobmemo.interview_attended }}</td>
                        <td>{{ jobmemo.interview_called }}</td>
                        <td class="d-flex">
                            <v-btn class="mr-1"><v-icon>mdi mdi-note-edit-outline</v-icon></v-btn> 
                            <v-btn color="red-darken-1"><v-icon>mdi mdi-delete-outline</v-icon></v-btn> 
                        </td>
                    </tr>
                    </tbody>
                </v-table>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import { ref,onMounted } from 'vue';
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const jobmemos = ref([])         

    function getAllJobMemos(){
        axios.get('job-memos')
        .then(response => {
            console.log(response.data.data);
            jobmemos.value = response.data?.data
        } )
        .catch(error => {
            console.error(error);
        });
    }
    onMounted(()=>{
        getAllJobMemos()
    })

</script>

<style scoped>

</style>