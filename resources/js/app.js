require('./bootstrap');

import Vue from 'vue'

import { InertiaApp } from '@inertiajs/inertia-vue'
import { InertiaForm } from 'laravel-jetstream'
import PortalVue from 'portal-vue'
import {ServerTable, ClientTable, Event} from 'vue-tables-2'
import wysiwyg from "vue-wysiwyg"
import VueGoodTablePlugin from 'vue-good-table';

// import the styles 
import 'vue-good-table/dist/vue-good-table.css'
Vue.use(VueGoodTablePlugin);
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(ClientTable, {skin: "table-auto"}, false, 'bootstrap4')
// Vue.use(ClientTable, [options = {}], [useVuex = false], [theme = 'bootstrap3'], [swappables = {}])
Vue.use(wysiwyg, {
  image: {
    uploadURL: "/upload",
    dropzoneOptions: {
      headers: { 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
    }
  },
   maxHeight: "500px",
})

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
