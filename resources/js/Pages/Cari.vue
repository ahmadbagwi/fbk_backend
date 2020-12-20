<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <Slider />
          <h3 class="text-2xl text-gray-700 text-center font-semibold mx-1">
            Hasil Pencarian
          </h3>
          <PenerimaGrid :penerimaAcakGrid="cari" />
          <div class="p-4 block mx-center">
            <inertia-link href="/">
              <button class="flex w-24 max-w-24 text-white-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
              &#8656; &nbsp;Kembali
              </button>
            </inertia-link>
          </div>
          <Footer />
        </div>
      </div>
    </div>
  </fbk-layout>
</template>

<script>
  import FbkLayout from './../Layouts/FbkLayout'
  import Slider from './../Components/Slider'
  import Profil from './../Components/Profil'
  import PenerimaGrid from './../Components/PenerimaGrid'
  import Footer from './../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Slider,
      Profil,
      PenerimaGrid,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        cari: this.data,
      }
    },
  }
</script>
