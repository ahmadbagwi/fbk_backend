<template>
  <div class="w-full mx-auto">
    <div class="grid grid-cols-3 gap-2 mt-10 px-10">
      <div v-for="list in komite" :key="list.id" class="col-span-3 md:col-span-1 shadow-md rounded-lg p-1">
        <div class="text-gray-800 text-center text-sm px-1">
          <img :src="list.featured" class="block rounded-full w-40 mx-auto" :id="list.slug">
          <h3 v-html="list.judul" class="text-center font-bold"></h3>
          <div class="p-2">
            <span v-html="list.konten"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {
  
  },
  props: {
    komite: {}
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
