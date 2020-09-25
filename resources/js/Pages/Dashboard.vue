<template>
  <!-- <fade-transition origin="center" mode="out-in" :duration="250">  -->
  <app-layout>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ konten }}
      </h2>
    </template>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <!-- <biodata v-if="this.konten == 'biodata'" /> -->


            <welcome/>

          </div>
        </div>
      </div>
      <div v-if="lists">
        <tr cellpadding="1" v-for="(list, index) in lists" :key="list.id">
          <td> {{ index }} </td>
          <td>{{ list }}</td>
        </tr>
      </div>
  </app-layout>
  <!-- </fade-transition>   -->
</template>

<script>
    import {FadeTransition} from 'vue2-transitions'
    import AppLayout from './../Layouts/AppLayout'
    import Welcome from './../Jetstream/Welcome'
    import Biodata from './../Form/Biodata'

    export default {
        components: {
            AppLayout,
            Welcome,
            FadeTransition,
            Biodata
        },
        props: {
          satu: null,
          dua: null,
          lists: {}
        },
        data() {
          return {
            konten: this.$page.currentRouteName
          }
        }
    }
</script>
