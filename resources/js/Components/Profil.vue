<template>
  <div class="w-full mx-auto">
    <div class="z-30 relative opacity-85 p-2 px-4 sm:p-2 flex justify-between">
      <inertia-link href="/">
        <div class="text-white flex">
          <img class="h-10 md:h-16" src="/storage/kemdikbud-putih.png">
          <div class="flex-column">
            <div class="text-sm sm:text-2xl font-bold">Fasilitasi Bidang</div> 
            <div class="text-md sm:text-3xl font-bold leading-4">Kebudayaan</div>
          </div>
        </div>
      </inertia-link>
      <div class="flex p-1 sm:p-4">
        <input type="text" class="w-28 sm:w-full rounded p-1 shadow" placeholder="Cari">
      </div>
    </div>
    <div class="z-0 -mt-20">
        <img :src="`/${profil.foto}`">
    </div>
    <div class="p-4 block">
      <div class="flex-column mx-auto text-center pb-2 border-b border-gray-500">
        <img :src="`/${profil.foto_penerima}`" class="rounded-full shadow w-40 mx-auto">
        <div class="font-bold text-2xl">&#128195; {{profil.nama_project}}</div>
        <div class="font-bold text-2xl">&#128203; {{profil.nama_penerima}}</div>
      </div>
      <div class="flex-column sm:flex my-2">
        <div class="p-2 mx-1 rounded bg-green-500 shadow text-gray-200">
          &#128194; {{ profil.kategori }}
        </div>
        <div class="p-2 mx-1 rounded bg-blue-500 shadow text-gray-200">
          &#128197; {{ profil.waktu }}
        </div>
        <div class="p-2 mx-1 rounded bg-red-500 shadow text-gray-200">
          &#9993; {{ profil.kontak }}
        </div>
      </div>
      <div class="grid grid-cols-4 gap-6 md:p-8 break-normal">
        <div class="col-span-4 md:col-span-4 my-4 break-normal pb-4 border-b border-gray-500">
          <h2 class="text-2xl text-gray-700">
            Deskripsi
          </h2>
          <p class="break-normal">
            <span v-html="profil.deskripsi" class="break-normal"></span>
          </p>
        </div>
        <div class="col-span-4 md:col-span-4 my-4 break-normal">
          <h2 class="text-2xl text-gray-700">
            Profil Penerima
          </h2>
          <p class="break-normal">
            <span v-html="profil.profil_penerima" class="break-normal"></span>
          </p>
        </div>
      </div>
    </div>
    <div class="p-4 block">
      <inertia-link href="/">
        <button class="flex w-24 max-w-24 text-white-700 border-green-400 bg-blue-400 hover:bg-gray-200 px-1 py-1 rounded shadow" >
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
    profil: {}
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
