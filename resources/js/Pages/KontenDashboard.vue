<template>
  <KontenAppLayout>
    <template #header>
      <h2 class="font-semibold text-xl .bg-green-400 leading-tight">
        <h1>Selamat Datang Admin</h1>
      </h2>
    </template>
    <fade-transition origin="center" mode="out-in" :duration="250">
      <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-1 md:py-4 md:px-12">
            <KontenMenuGrid />
          </div>
        </div>
      </div>
    </fade-transition>
  </KontenAppLayout>
</template>

<script>
  import KontenAppLayout from './../Layouts/KontenAppLayout'
  import KontenMenuGrid from './../Components/KontenMenuGrid'
  import {FadeTransition} from 'vue2-transitions'

  export default {
    components: {
      KontenAppLayout,
      KontenMenuGrid,
      FadeTransition
    },
    props: {
      user: {}
    },
    data() {
      return {
      
      }
    }
  }
</script>
