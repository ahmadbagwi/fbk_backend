<template>
  <div class="w-full mx-auto my-4 md:my-8">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        -NEWS <span class="font-bold">POOL-</span>
      </h2>
    </div>
    <div class="grid grid-cols-3 gap-6 px-10">
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-2" v-for="list in data" :key="list.id">
        <img class="" :src="list.img">
        <div class="text-gray-800 font-xs md:font-sm font-semibold py-2">
          {{ list.text }}
        </div>
      </div>
    </div>
  </div>

</template>

<script>
export default {
  components: {
  
  },

  data () {
    return {
      data: [
        {id: 1, img: '/storage/news1.png', text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.'},
        {id: 2, img: '/storage/news2.png', text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.'},
        {id: 3, img: '/storage/news1.png', text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.'},
      ],
    }
  }
}
</script>
