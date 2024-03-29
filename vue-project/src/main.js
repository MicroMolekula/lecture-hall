
import { createApp } from 'vue'
import App from './App.vue'
import './assets/main.css'
// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
import axios from 'axios'
import VueAxios from 'vue-axios'
import Markdown from 'vue3-markdown-it'
import {AVPlugin} from "vue-audio-visual";
import 'highlight.js/styles/monokai.css';

import 'material-design-icons-iconfont/dist/material-design-icons.css'
import "@mdi/font/css/materialdesignicons.css";
const vuetify = createVuetify({
    components,
    directives,
  })

createApp(App).use(vuetify).use(VueAxios,axios).use(Markdown).use(AVPlugin).mount('#app')
