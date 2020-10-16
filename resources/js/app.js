require('./bootstrap');

import Vue from 'vue'

import { InertiaApp } from '@inertiajs/inertia-vue'
import { InertiaForm } from 'laravel-jetstream'
import PortalVue from 'portal-vue'
import wysiwyg from "vue-wysiwyg"
import VueGoodTablePlugin from 'vue-good-table'
import JsonExcel from 'vue-json-excel'
import 'vue-good-table/dist/vue-good-table.css'
import { BootstrapVueIcons } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'

Vue.use(BootstrapVueIcons)
Vue.use(VueGoodTablePlugin);
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

Vue.use(wysiwyg, {
  image: {
    uploadURL: "/upload",
    dropzoneOptions: {
      headers: { 'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
    }
  },
   maxHeight: "500px",
})
Vue.component('downloadExcel', JsonExcel)

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
