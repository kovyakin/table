import './bootstrap';
import {createApp} from "vue/dist/vue.esm-bundler.js";

import Table from '@/components/Table.vue';
if (document.getElementById("table") !== null) {
    createApp(Table).mount("#table")
}