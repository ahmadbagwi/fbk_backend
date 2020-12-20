<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <div class="z-30 relative opacity-85 p-2 px-4 sm:p-2 flex justify-between">
            <inertia-link href="/">
              <div class="text-white flex">
                <img class="h-10 md:h-16" src="/storage/kemdikbud-putih.png">
                <div class="flex-column">
                  <div class="text-sm sm:text-2xl font-bold">Fasilitasi Bidang</div> 
                  <div class="text-md sm:text-3xl font-bold leading-4">Kebudayaan</div>
                </div>
              </div>
            </inertia-link>
            <div class="flex p-1 sm:p-4">
              <!-- <input type="text" class="w-28 sm:w-full rounded p-1 shadow" placeholder="Cari"> -->
            </div>
          </div>
          <div class="z-0 -mt-20">
              <img :src="`/storage/heading-4.JPG`">
          </div>
          <h3 class="text-3xl text-gray-700 text-center font-semibold mx-1 my-4">
            {{ heading }}
          </h3>
          <KomiteGrid :komite="komite" />
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
  import KomiteGrid from './../Components/KomiteGrid'
  import Footer from './../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Slider,
      KomiteGrid,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        komite: this.data,
      }
    },
    computed: {
      heading: function () {
        if (this.data[0].kategori == 'komite') {
          return 'Komite';
        } else {
          return 'Berita'
        }
      }
    }
  }
</script>
