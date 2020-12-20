<template>
  <div class="w-full mx-auto">
    <div class="grid grid-cols-3 gap-2 mt-10 px-10">
      <div class="col-span-3 shadow-md rounded-lg p-1">
        <div class="text-gray-800 text-center text-sm px-1">
          <img :src="blog.featured" class="block w-full mx-auto">
          <h3 v-html="blog.judul" class="text-2xl text-center font-bold"></h3>
          <div class="p-2 text-md">
            <span v-html="blog.konten"></span>
          </div>
        </div>
      </div>
    </div>
    <div class="p-4 block mx-center">
      <inertia-link href="/">
        <button class="flex w-24 max-w-24 text-white-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
        &#8656; &nbsp;Kembali
        </button>
      </inertia-link>
    </div>
  </div>
</template>

<script>
export default {
  components: {
  
  },
  props: {
    blog: {}
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
