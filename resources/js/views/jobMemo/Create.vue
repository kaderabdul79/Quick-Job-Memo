<template>
    <v-row justify="center">
      <v-dialog v-model="dialog" persistent  width="1024">
        <template v-slot:activator="{ props }">
          <v-btn
            color="primary"
            v-bind="props"
          >
          </v-btn>
        </template>
        <v-card>
          <v-card-title>
            <span class="text-h5">Add a Job Memo</span>
          </v-card-title>
          <v-card-text>
            <v-container>
              <v-row>{{ jobmemo }}
                <v-col tags="v-form" cols="12">
                    <v-row>
                    <v-col cols="12" sm="6" md="6"><v-text-field v-model="jobmemo.job_title" label="Job Title*"></v-text-field></v-col>
                    <v-col cols="12" sm="6" md="6"><v-text-field v-model="jobmemo.deadline" label="Deadline" type="date"></v-text-field></v-col>
                    <v-col cols="12" sm="6" md="6"><v-text-field v-model="jobmemo.experience" label="location"></v-text-field></v-col>
                    <v-col cols="12" sm="6" md="6"><v-select label="Tech Stack" :items="jobmemo.tech_stacks" v-model="jobmemo.tech_stack"></v-select></v-col>
                    <v-col cols="12" sm="4" md="4"><v-text-field v-model="jobmemo.location" label="Location"></v-text-field></v-col>
                    <v-col cols="12" sm="4" md="4"><v-checkbox v-model="jobmemo.interview_called" label="Interview called"></v-checkbox></v-col>
                    <v-col cols="12" sm="4" md="4"><v-checkbox v-model="jobmemo.interview_attended" label="Interview attended"></v-checkbox></v-col>
                </v-row>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions class="mx-8">
            <v-btn color="blue-darken-1" type="submit" @click="addNewJobMemo" variant="text" class="bg-primary px-12">Save</v-btn>
            <v-spacer></v-spacer>
            <v-btn color="blue-darken-1" variant="text" @click="resetData">Reset</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </template>

<script setup>
import { ref } from 'vue';
const dialog = ref(false);
// 
import Form from 'vform'
// 
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const jobmemo = ref(new Form(
    {
        job_title: '',
        deadline: "",
        experience: "",
        tech_stack: null,
        tech_stacks: ["php,laravel","laravel vue","react laravel"],
        location: "",
        interview_called: false,
        interview_attended: false,
    }
));
function addNewJobMemo() { 
    // 
    axios.post('job-memos',     {
        job_title: jobmemo.value.job_title,
        deadline: jobmemo.value.deadline,
        experience: jobmemo.value.experience,
        tech_stack: jobmemo.value.tech_stack,
        location: jobmemo.value.location,
        interview_called: jobmemo.value.interview_called,
        interview_attended: jobmemo.value.interview_attended,
    })
        .then(response => {
            console.log(response.data);
            dialog.value = false
        })
        .catch(error => {
            jobmemo.value.errors.errors = error.response.data.errors;
            console.error(error);
        });
} 
function resetData(){
    return jobmemo.value = {}
}
</script>

<style scoped>

</style>