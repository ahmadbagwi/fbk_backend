<template>
  <div class="w-full mx-auto">
    <div class="z-30 relative opacity-85 p-2 px-4 sm:p-2 flex justify-between">
      <div class="text-white flex">
        <img class="h-10 md:h-16" src="/storage/kemdikbud-putih.png">
        <div class="flex-column">
          <div class="text-sm sm:text-2xl font-bold">Fasilitasi Bidang</div> 
          <div class="text-md sm:text-3xl font-bold leading-4">Kebudayaan</div>
        </div>
      </div>
      <div class="flex p-1 sm:p-4">
        <input type="text" class="w-28 sm:w-full rounded p-1 shadow" placeholder="Cari">
      </div>
    </div>
    <div class="z-0 -mt-20">
      <splide :options="options">
        <splide-slide v-for="list in data" :key="list.id" class="z-0">
          <img :src="list.img">
        </splide-slide>
      </splide>
    </div>
  </div>
</template>

<script>
import { Splide, SplideSlide } from '@splidejs/vue-splide'
import '@splidejs/splide/dist/css/themes/splide-skyblue.min.css'
// import Input from '../Jetstream/Input.vue'

export default {
  components: {
    Splide,
    SplideSlide,
    // Input,
  },

  data () {
    return {
      data: [
        {id: 1, img: '/storage/slider-1.png'},
        {id: 2, img: '/storage/slider-2.jpg'},
      ],
      options: {
        rewind : true,
        // width  : 1300,
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
