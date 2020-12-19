<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <Profil :profil="profil"/>
          <Footer />
        </div>
      </div>
    </div>
  </fbk-layout>
</template>

<script>
  import FbkLayout from './../../Layouts/FbkLayout'
  import Profil from './../../Components/Profil'
  import Footer from './../../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Profil,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        profil: this.data
      }
    }
  }
</script>
