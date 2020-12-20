<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <Profil :profil="profil"/>
          <h3 class="text-2xl text-gray-700 text-center font-semibold mx-1">
            Penerima Lainnya
          </h3>
          <PenerimaGrid :penerimaAcakGrid="penerimaAcakGrid" />
          <Footer />
        </div>
      </div>
    </div>
  </fbk-layout>
</template>

<script>
  import FbkLayout from './../../Layouts/FbkLayout'
  import Profil from './../../Components/Profil'
  import PenerimaGrid from './../../Components/PenerimaGrid'
  import Footer from './../../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Profil,
      PenerimaGrid,
      Footer
    },
    props: {
      data: {},
      penerimaAcak: {},
    },
    data() {
      return {
        profil: this.data,
        penerimaAcakGrid: this.penerimaAcak
      }
    },
  }
</script>
