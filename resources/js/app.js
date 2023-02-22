import './bootstrap';
import {createApp} from 'vue';

import login from './vue/login.vue';
import dashADM from './vue/dashADM.vue';
import dashProfessor from './vue/dashProfessor.vue';

createApp(login).mount("#login");
createApp(dashADM).mount("#dashADM");
createApp(dashProfessor).mount("#dashProfessor");
