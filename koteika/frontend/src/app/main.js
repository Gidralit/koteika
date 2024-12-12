import "@/assets/styles/style.css"
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { VueMaskDirective } from 'v-mask';

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.directive('mask', VueMaskDirective.bind);

app.mount('#app')
