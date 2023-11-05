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
  
                    <div class="mt-4">{{ user?.name }}</div>
                    <div class="">{{ user?.email }}</div>
                    <span class="mb-6 text-caption bg-blue pa-1">{{ user?.designation ? user.designation : 'Ex: Engineer' }}</span>
                    <div class="text-subtitle1 px-4">{{ user?.about ? user.about : 'Ex: A user of Job Memo' }}</div>
                    <v-card-title>Job Memo Overview</v-card-title>

                    <div class="px-4">
                        <v-chip-group v-model="selection">
                            <v-chip>{{ jobMemoOverview.totalJobMemos }} Available Job</v-chip>

                            <v-chip>Got Interview call {{ jobMemoOverview.interviewCalled }}</v-chip>

                            <v-chip>Interview Attended {{ jobMemoOverview.interviewAttended }}</v-chip>

                            <v-chip>Expired 1</v-chip>
                        </v-chip-group>
                    </div>
                  </v-sheet>
                  <div v-else class="loading-spinner">
                    <v-progress-circular  color="#00ACC1" indeterminate :size="80" :width="5"></v-progress-circular>
                </div>
                </v-col>
                <v-col cols="6" md="6" xs="12">{{ userData }}
                  <v-sheet v-if="user" class="pa-4 border rounded-xl text-center">
                    <div><v-sheet class="text-h5 mb-2">Update profile</v-sheet></div>
                    <v-form @submit.prevent="updateProfile">
                      <v-text-field v-model="userData.name" label="Name*"></v-text-field>
                      <v-text-field v-model="userData.email" label="Email*"></v-text-field>
                      <v-text-field v-model="userData.designation" label="Designation"></v-text-field>
                      <v-file-input type="file" @change="handleFileChange" v-model="userData.profile" label="Upload Profile Picture"></v-file-input>
                      <v-textarea v-model="userData.about" clearable label="About Me"></v-textarea>
                      <v-btn type="submit" @click="updateProfile" block color="#00ACC1 ">Update</v-btn>
                    </v-form>
                  </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script setup>
import { ref,onMounted } from "vue";
const isLoading = ref(true)   
import useAuth from '@/composables/useAuth.js'
const { user,fetchUser, handleLogout} = useAuth()
import Swal from 'sweetalert2';
import Form from 'vform'
import axios from 'axios'
axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
const jobMemoOverview = ref({})
onMounted(()=>{
  fetchUser()
  jobmemoOverview()
})
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
const userData = ref({
      name: user ? user.value?.name : "",
      email: user ? user.value?.email : "",
      designation: "",
      about: "",
      picture: null,
    });

    const handleFileChange = (event) => {
      userData.value.picture = event.target.files[0].name;
      console.log("Selected picture:", userData.value.picture);
    };

    // Function to build FormData object
  //   const buildFormData = () => {
  //     if (!userData.value) {
  //   return "ssssssssssllllll"; // Handle empty data
  // }
  //     const formData = new FormData();
      
  //     formData.append('name', userData.value.name);console.log(userData.value.name);
  //     formData.append('email', userData.value.email);
  //     formData.append('designation', userData.value.designation);
  //     formData.append('about', userData.value.about || ''); // Handle about being null
  //     formData.append('picture', userData.value.picture);

  //     console.log("FormData:", formData);
  //     return formData;
  //   };

    const updateProfile = () => {
      // console.log("Selected 2:", userData.value.picture);
      // let formData = new FormData();
      // formData.append('picture', userData.value.picture);
      // formData.append('about',userData.value.about);
      // console.log(formData);
      axios.put('user/' + user.value?.id + '/update',
      {
        name: userData.value.name,
        email: userData.value.email,
        designation: userData.value.designation,
        about: userData.value.about,
        picture: userData.value.picture,
      }
        // { headers: {'Content-Type': 'multipart/form-data', }}
      )
        .then(response => {
          console.log(response.data);
          Swal.fire({ title: 'Profile has been updated!', icon: 'success', confirmButtonText: 'OK',timer: 2000});
        })
        .catch(error => {
          console.error("Error updating profile:", error);
        });
    }
// 
</script>

<style scoped>
.border{
  border: 2px solid #42a5f5;
}
</style>