<template>
  <div class="w-full mx-auto">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        <inertia-link href="/arsip/blog/blog">
          -Berita <span class="font-bold">FBK-</span>
        </inertia-link>
      </h2>
    </div>
    <div class="grid grid-cols-3 gap-2 mt-1 px-10">
      <div v-for="list in blog" :key="list.id" class="col-span-3 md:col-span-1 shadow-md rounded-lg p-1">
        <div class="text-gray-800 text-center text-sm px-1">
          <inertia-link :href="`/blog/${list.slug}`">
            <img :src="list.featured" class="block w-full mx-auto">
            <h3 v-html="list.judul" class="text-center font-bold"></h3>
            <div class="p-2">
              <span v-html="list.meta"></span>
            </div>
          </inertia-link>
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
