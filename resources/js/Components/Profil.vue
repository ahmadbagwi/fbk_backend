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
        <!-- <input type="text" class="w-28 sm:w-full rounded p-1 shadow" placeholder="Cari"> -->
      </div>
    </div>
    <div class="z-0 -mt-20">
        <img :src="`${profil.foto}`" class="object-cover w-full mx-auto">
    </div>
    <div class="p-4 block">
      <div class="flex-column mx-auto text-center pb-2 border-b border-gray-500">
        <img :src="`${profil.foto_penerima}`" class="rounded-full shadow w-40 mx-auto">
        <div class="font-bold text-2xl my-1">&#128195; {{profil.nama_project}}</div>
        <div class="font-bold text-2xl my-1">&#128203; {{profil.nama_penerima}}</div>
      </div>
      <div class="w-full mx-auto my-2">
        <div class="grid grid-cols-3 gap-4">
          <div class="col-span-3 md:col-span-1 p-2">
            <div class="flex flex-col">
              <div class="p-4 bg-blue-300 my-1 flex">
                <img src="/storage/kategori.svg" class="text-white w-20 mr-2">
                <span class="text-white font-bold flex items-center">{{ profil.kategori }}</span>
              </div>
              <div class="p-4 bg-blue-200 my-1 flex">
                <img src="/storage/diajukan.svg" class="text-white w-20 mr-2">
                <span class="text-white font-bold flex items-center">{{ diajukan }}</span>
              </div>
            </div>
          </div>
          <div class="col-span-3 md:col-span-1 p-2">
            <div class="flex flex-col">
              <div class="p-4 bg-blue-400 my-1 flex">
                <img src="/storage/waktu.svg" class="text-white w-20 mr-2">
                <span class="text-white font-bold flex items-center">{{ profil.waktu }}</span>
              </div>
              <div class="p-4 bg-blue-500 my-1 flex">
                <img src="/storage/disetujui.svg" class="text-white w-20 mr-2">
                <span class="text-white font-bold flex items-center">{{ disetujui }}</span>
              </div>
            </div>
          </div>
          <div class="col-span-3 md:col-span-1 bg-pink-400 m-3 p-8 flex">
            <img src="/storage/email.svg" class="text-white w-20 mr-2">
                <span class="text-white font-bold flex items-center">{{ profil.kontak }}</span>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-4 gap-6 md:p-8 break-normal">
        <div class="col-span-4 md:col-span-4 my-4 break-normal pb-4 border-b border-gray-500">
          <h2 class="text-2xl text-gray-700">
            Profil Kegiatan
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
      <div class="grid grid-cols-4 gap-4">
        <span v-if="url_facebook" class="col-span-4 md:col-span-1 mx-2">
          <a :href="url_facebook" target="_blank" class="flex">
            <img src="/storage/facebook.png" class="w-8">
            <span class="text-md md:text-lg text-gray-600 mx-2">{{ akun_facebook }}</span>
          </a>
        </span>
        <span v-if="url_twitter" class="col-span-4 md:col-span-1 mx-2">
          <a :href="url_twitter" target="_blank" class="flex">
            <img src="/storage/twitter.png" class="w-8">
            <span class="text-md md:text-lg text-gray-600 mx-2">{{ akun_twitter }}</span>
          </a>
        </span>
        <span v-if="url_instagram" class="col-span-4 md:col-span-1 mx-2">
          <a :href="url_instagram" target="_blank" class="flex">
            <img src="/storage/instagram.png" class="w-8">
            <span class="text-md md:text-lg text-gray-600 mx-2">{{ akun_instagram }}</span>
          </a>
        </span>
        <span v-if="url_youtube" class="col-span-4 md:col-span-1 mx-2">
          <a :href="url_youtube" target="_blank" class="flex">
            <img src="/storage/youtube.png" class="w-8">
            <span class="text-md md:text-lg text-gray-600 mx-2">Youtube</span>
          </a>
        </span>
      </div>
    </div>
    <div class="p-4 block">
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
    profil: {}
  },
  data () {
    return {
      akun_facebook: '',
      akun_twitter: '',
      akun_instagram: '',
      url_facebook: '',
      url_twitter: '',
      url_instagram: '',
      url_youtube: '',
      data: [
        {id: 1, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 1'},
        {id: 2, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 2'},
        {id: 3, img: '/storage/profile.jpeg', text: 'Lorem Ipsum 3'},
      ],
    }
  },
  created () {
    if(this.profil.media_sosial != '') {
      let array_medsos = []
      array_medsos.push(this.profil.media_sosial.split(","))
      this.akun_facebook = array_medsos[0][0]
      this.url_facebook = array_medsos[0][1]
      this.akun_twitter = array_medsos[0][2]
      this.url_twitter = array_medsos[0][3]
      this.akun_instagram = array_medsos[0][4]
      this.url_instagram = array_medsos[0][5]
      this.url_youtube = array_medsos[0][6]
    }
  },
  computed: {
    diajukan: function () {
      return this.$currency(this.profil.nominal_diajukan)
    },
    disetujui: function () {
      return this.$currency(this.profil.nominal_disetujui)
    },
  },
}
</script>
