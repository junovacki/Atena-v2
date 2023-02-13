import './bootstrap';
import {createApp} from 'vue';

import login from './vue/login.vue';
import dashADM from './vue/dashADM.vue';

createApp(login).mount("#login");
createApp(dashADM).mount("#dashADM");
