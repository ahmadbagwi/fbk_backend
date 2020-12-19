<template>
  <div class="w-full mx-auto my-8">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        -PENERIMA <span class="font-bold">FBK 2020-</span>
      </h2>
    </div>
    <div class="grid grid-cols-3 gap-6 mt-10 px-10">
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-8">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-20">
          <splide :options="options">
            <splide-slide v-for="list in penerima.dokumentasi" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <ul class="list-none">
            <li v-for="list in penerima.dokumentasi" :key="list.id">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-8">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-20">
          <splide :options="options">
            <splide-slide v-for="list in penerima.penciptaan" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <ul class="list-none">
            <li v-for="list in penerima.penciptaan" :key="list.id">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-8">
        <!-- <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`"> -->
        <div class="z-0 -mt-20">
          <splide :options="options">
            <splide-slide v-for="list in penerima.pendayagunaan" :key="list.id" class=" mx-auto w-full">
              <img :src="list.foto_penerima" class="mx-auto rounded-full w-40">
            </splide-slide>
          </splide>
        </div>
        <div class="text-gray-800 text-center text-sm px-1">
          <ul class="list-none">
            <li v-for="list in penerima.pendayagunaan" :key="list.id">
              <inertia-link :href="`/profil/${list.id}`">{{ list.nama_penerima }}</inertia-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/splide/dist/css/themes/splide-skyblue.min.css'
export default {
  components: {
    Splide,
    SplideSlide,
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
      options: {
        rewind : true,
        // width  : 1300,
        type: 'fade',
        arrows: false,
        pagination: false,
        interval: 200,
        arrowPath: false,
        gap    : '1rem',
        autoplay: true,
        autoWidth: true,
        autoHeight: true,
        // cover  : true,
        // height : '8rem',
      },
    }
  }
}
</script>
