<template>
    <div id="jobmemos">  
        <v-container fluid>
            <v-row>
                <div v-if="isLoading" class="loading-spinner">
                    <v-progress-circular  color="#00ACC1" indeterminate :size="80" :width="5"></v-progress-circular>
                </div>
                <v-col v-else cols="12" md="12" xs="6">
                    <v-sheet class="d-flex justify-space-between mb-2">
                        <h2 class="">List of Job Memos</h2>
                        <div><v-btn :to="{name: 'createJobMemo'}" color="#00ACC1">Add New</v-btn></div>
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
                            <v-btn @click="deleteJobMemo(jobmemo.id)" color="red-darken-1"><v-icon>mdi mdi-delete-outline</v-icon></v-btn> 
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
import Swal from 'sweetalert2';
import Create from '@/views/jobMemo/Create.vue';
const jobmemos = ref([])         
const isLoading = ref(true)   

function getAllJobMemos(){
    axios.get('job-memos')
    .then(response => {
        console.log(response.data.data);
        jobmemos.value = response.data?.data
        isLoading.value = false
    } )
    .catch(error => {
        console.error(error);
    });
}

onMounted(()=>{
    getAllJobMemos()
})
    
// delete a JobMemo
function deleteJobMemo(id){
    axios.delete('job-memos/'+id)
    .then(response => {
        Swal.fire({ title: 'Job memo deleted!', icon: 'success', confirmButtonText: 'OK',timer: 2000});
        getAllJobMemos()
        console.log(response);
        })
    .catch(error => {
        console.error(error);
    });
}
</script>

<style>
.loading-spinner {
  position: fixed;
  top: 0;
  left: 100px;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>