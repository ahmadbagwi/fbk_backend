<template>
  <div class="w-full mx-auto my-8">
    <div class="grid grid-cols-3 gap-6 px-10">
      <div class="col-span-3 md:col-span-1 grid-penerima shadow-md rounded-lg p-8" v-for="list in penerima.dokumentasi" :key="list.id">
        <img class="rounded-full text-center mx-auto" :src="`/${list.foto_penerima}`">
        <div class="text-gray-800 text-center text-sm px-1">
          <ul class="list-none">
            <li><inertia-link :href="`/profil/${list.id}`">{{ list.nama_project }}</inertia-link></li>
          </ul>
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
    penerima: {}
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
