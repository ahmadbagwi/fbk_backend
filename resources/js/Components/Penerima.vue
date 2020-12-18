<template>
  <div class="w-full mx-auto my-8">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        -PENERIMA <span class="font-bold">FBK 2020-</span>
      </h2>
    </div>
    <div class="grid grid-cols-3 gap-6 px-10">
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-8" v-for="list in data" :key="list.id">
        <img class="rounded-full text-center mx-auto" :src="list.img">
        <div class="text-gray-800 text-center font-sm">
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
        {id: 1, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 1'},
        {id: 2, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 2'},
        {id: 3, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 3'},
      ],
    }
  }
}
</script>
