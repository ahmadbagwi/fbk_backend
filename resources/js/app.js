require('./bootstrap');

import Vue from 'vue'

import { InertiaApp } from '@inertiajs/inertia-vue'
import { InertiaForm } from 'laravel-jetstream'
import PortalVue from 'portal-vue'
import {ServerTable, ClientTable, Event} from 'vue-tables-2'
import wysiwyg from "vue-wysiwyg"

Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);
Vue.use(ClientTable, {}, false, 'bootstrap4')
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
