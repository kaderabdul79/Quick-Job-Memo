import { ref, onMounted } from 'vue';

import axios from 'axios';
axios.defaults.baseURL = "http://127.0.0.1:8000/api/";

import { useRouter } from 'vue-router';
const router = useRouter();

const user = ref(null);

export default function useAuth() {

    // login
    // const handleLogin = async () => {
    //     try {
    //       await axios.get('sanctum/csrf-cookie');
    //       const response = await axios.post('login', {
    //         email: userData.value.email,
    //         password: userData.value.password,
    //       });
      
    //       console.log(response.data);
    //       localStorage.setItem('token', response.data.token);
    //       router.push('/');
    //     } catch (error) {
    //       console.error(error);
    //       userData.value.errors.errors = error.response.data.errors;
    //     }
    //   };

    const fetchUser = async () => {
        try {
        // Retrieve token from local storage
        const storedToken = localStorage.getItem('token');
        
        if (storedToken) {
            // Set the stored token in the headers
            axios.defaults.headers.common['Authorization'] = `Bearer ${storedToken}`;
            // Retrieve user information
            const response = await axios.get('/user');
            user.value = response.data.data;
        }
        } catch (error) {
            console.error(error);
        }
    };

    // Logout
    const handleLogout = () => {
        user.value = null;
        // Remove token from local storage
        localStorage.removeItem('token');
        router.push({ name: 'login' });
    };

  return {
    user,
    handleLogin,
    fetchUser,
    handleLogout,
  };
};
