import App from './App.vue'
import router from './router'

import { createApp } from 'vue'
import '@mdi/font/css/materialdesignicons.css'

import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

// 
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const app = createApp(App)


const vuetify = createVuetify({
    components,
    directives,
    icons: {
      defaultSet: 'mdi', 
    },
    theme: {
      // colors: {
      //   primary: '#ECEFF1',
      //   secondary: '#FF7043'
      // }
    },
})

app.use(router)
app.use(vuetify)
app.use(VueSweetalert2);

app.mount('#app')
