<template>
  <div class="w-full mx-auto my-8">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        -PENERIMA <span class="font-bold">FBK 2020-</span>
      </h2>
    </div>
    <div class="grid grid-cols-3 gap-6 mt-10 px-10">
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-4">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-1 sm:-mt-20 flex justify-center">
          <splide :options="options">
            <splide-slide v-for="list in dokumentasi" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <h3 class="text-lg font-bold text-center py-4">
            Dokumentasi Karya/Pengetahuan Maestro
          </h3>
          <ul class="list-none px-0">
            <li v-for="list in dokumentasi" :key="list.id" class="border border-white bg-gray-100 p-1 hover:bg-gray-200 hover:text-blue-500">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
          <div class="mx-auto">
            <inertia-link href="/arsip/profil/Dokumentasi">
              <button class="bg-gray-100 rounded p-2 text-gray-700 text-sm shadow hover:bg-gray-200">
                &#8658; Lihat semua
              </button>
            </inertia-link>
          </div>
        </div>
      </div>
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-4">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-1 sm:-mt-20 flex justify-center">
          <splide :options="options">
            <splide-slide v-for="list in penciptaan" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <h3 class="text-lg font-bold text-center py-4">
            Penciptaan Karya Kreatif Inovatif
          </h3>
          <ul class="list-none px-0">
            <li v-for="list in penciptaan" :key="list.id" class="border border-white bg-gray-100 p-1 hover:bg-gray-200 hover:text-blue-500">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
          <div class="mx-auto">
            <inertia-link href="/arsip/profil/Penciptaan">
              <button class="bg-gray-100 rounded p-2 text-gray-700 text-sm shadow hover:bg-gray-200">
                &#8658; Lihat semua
              </button>
            </inertia-link>
          </div>
        </div>
      </div>
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-4">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-1 sm:-mt-20 flex justify-center">
          <splide :options="options">
            <splide-slide v-for="list in pendayagunaan" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <h3 class="text-lg font-bold text-center py-4 px-2">
            Pendayagunaan Ruang Publik
          </h3>
          <ul class="list-none px-0">
            <li v-for="list in  pendayagunaan" :key="list.id" class="border border-white bg-gray-100 p-1 hover:bg-gray-200 hover:text-blue-500">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
          <div class="mx-auto">
            <inertia-link href="/arsip/profil/Pendayagunaan">
              <button class="bg-gray-100 rounded p-2 text-gray-700 text-sm shadow hover:bg-gray-200">
                &#8658; Lihat semua
              </button>
            </inertia-link>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/splide/dist/css/themes/splide-skyblue.min.css'
import Button from '../Jetstream/Button.vue'
export default {
  components: {
    Splide,
    SplideSlide,
    Button,
  },
  props: {
    penerima: {}
  },
  data () {
    return {
      data: [
        {id: 1, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 1'},
        {id: 2, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 2'},
        {id: 3, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 3'},
      ],
      limit: 5,
      options: {
        rewind : true,
        // width  : 1300,
        type: 'fade',
        arrows: false,
        pagination: false,
        interval: 2500,
        arrowPath: false,
        gap    : '1rem',
        autoplay: true,
        autoWidth: true,
        autoHeight: true,
        // cover  : true,
        // height : '8rem',
      },
    }
  },
  computed: {
    dokumentasi: function () {
      return this.limit ? this.penerima.dokumentasi.slice(0,this.limit) : this.penerima.dokumentasi
    },
    penciptaan: function () {
      return this.limit ? this.penerima.penciptaan.slice(0,this.limit) : this.penerima.penciptaan
    },
    pendayagunaan: function () {
      return this.limit ? this.penerima.pendayagunaan.slice(0,this.limit) : this.penerima.pendayagunaan
    }
  }
}
</script>
