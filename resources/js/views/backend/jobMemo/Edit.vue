<template>
    <div class="edit-jobmemo">
        <v-container fluid>
            <v-row>
                <div v-if="isLoading" class="loading-spinner">
                    <v-progress-circular  color="#00ACC1" indeterminate :size="80" :width="5"></v-progress-circular>
                </div>
                <v-col tags="v-form" cols="12">
                    <v-row>
                    <v-col cols="6" xs="12" offset-md="3" offset-xs="3">
                        <div><v-sheet class="text-h4 text-center my-2">Edit Job Memo</v-sheet></div>
                        <v-text-field v-model="jobmemo.job_title" label="Job Title*"></v-text-field>
                        <div class="text-subtitle-2 text-red" v-if="jobmemo.errors.has('job_title')" v-html="jobmemo.errors.get('job_title')" />

                        <v-text-field v-model="jobmemo.deadline" label="Deadline" type="date"></v-text-field>
                        <div class="text-subtitle-2 text-red" v-if="jobmemo.errors.has('deadline')" v-html="jobmemo.errors.get('deadline')" />

                        <v-checkbox v-model="jobmemo.interview_called" label="Interview called"></v-checkbox>
                        <div class="text-subtitle-2 text-red" v-if="jobmemo.errors.has('interview_called')" v-html="jobmemo.errors.get('interview_called')" />

                        <v-checkbox v-model="jobmemo.interview_attended" label="Interview attended"></v-checkbox>
                        <div class="text-subtitle-2 text-red" v-if="jobmemo.errors.has('interview_attended')" v-html="jobmemo.errors.get('interview_attended')" />

                        <v-btn type="submit" @click="updateJobMemo" variant="text" class="bg-teal px-12 ml-4">Update Information</v-btn>
                    </v-col>
                </v-row> 
                </v-col>
              </v-row>
        </v-container>    
    </div>
</template>

<script setup>
import { ref,onMounted } from 'vue';

import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const props = defineProps(['id']);
import Form from 'vform'
const isLoading = ref(true) 
import Swal from 'sweetalert2';
import { useRouter } from 'vue-router'
const router = useRouter()

const jobmemo = ref(new Form(
    {
        job_title: '',
        deadline: "",
        interview_called: 0,
        interview_attended: 1,
    }
));
function getaJobMemos(){
    axios.get('job-memos/'+props.id+'/edit')
    .then(response => {
        // console.log(response.data?.data);
        jobmemo.value.fill(response.data?.data)
        isLoading.value = 
        console.log(jobmemo);
    } )
    .catch(error => {
        jobmemo.value.errors.errors = error.response?.data?.errors;
        Swal.fire({title: "please fillup the field's",icon: 'error',timer: 2000});
        console.error(error);
    });
}

function updateJobMemo(){
    // console.log(jobmemo.value);
    axios.put('job-memos/'+props.id, {
        job_title: jobmemo.value.job_title,
        deadline: jobmemo.value.deadline,
        interview_called: jobmemo.value.interview_called,
        interview_attended: jobmemo.value.interview_attended,
        user_id:1
    })
        .then(response => {
            console.log(response.data);
            Swal.fire({ title: 'Job memo Updated!', icon: 'success', confirmButtonText: 'OK',timer: 2000});
            router.push({name: 'jobmemos'})
        })
        .catch(error => {
            jobmemo.value.errors.errors = error.response?.data?.errors;
            Swal.fire({title: "please fillup the field's",icon: 'error',timer: 2000});
            console.error(error);
        });
}
onMounted(()=>{
    getaJobMemos()
})
</script>

<style scoped>
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