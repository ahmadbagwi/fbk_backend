<template>
  <div class="w-full mx-auto md:my-8 my-8 px-8">
    <h2 class="text-3xl text-center py-4">
      -KOMITE <span class="font-bold">SELEKSI-</span>
    </h2>
    <div class="slider-mobile sm:hidden">
      <splide :options="options_mobile">
        <splide-slide v-for="list in data" :key="list.id">
          <img :src="list.img" class="mx-auto w-28 max-w-xs rounded-full">
        </splide-slide>
      </splide>
    </div>
    <div class="slider-desktop hidden sm:block">
      <splide :options="options">
        <splide-slide v-for="list in data" :key="list.id">
          <img :src="list.img" class="mx-auto w-40 max-w-xs rounded-full">
        </splide-slide>
      </splide>
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

  data () {
    return {
      data: [
        {id: 1, img: '/storage/profile2.jpg'},
        {id: 2, img: '/storage/profile2.jpg'},
        {id: 3, img: '/storage/profile2.jpg'},
        {id: 4, img: '/storage/profile2.jpg'},
        {id: 5, img: '/storage/profile2.jpg'},
        {id: 6, img: '/storage/profile2.jpg'},
      ],
      options: {
        rewind : true,
        // width  : 1300,
        gap    : '2rem',
        perPage: 4,
      },
      options_mobile: {
        rewind : true,
        // width  : 1300,
        gap    : '1rem',
        perPage: 2,
      },
    }
  }
}
</script>
