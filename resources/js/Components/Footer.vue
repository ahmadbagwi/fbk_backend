<template>
  <!-- <div class="w-full mx-auto md:my-8 my-8 p-8 grid grid-cols-4 gap-4 px-18 h-auto md:h-auto">
    <div class="cols-span-4 sm:col-span-1 p-2 grid grid-cols-2 gap-4">
      <div class="col-span-4 md:col-span-2 text-left">
        <img src="/storage/kemdikbud.png">
      </div>
      <div class="text-lg col-span-2 md:col-span-1">
        <span class="font-bold">Kementerian Pendidikan dan Kebudayaan</span><br>
        Komplek Kementerian Pendidikan dan Kebudayaan
        Jalan Jenderal Sudirman, Senayan
        Jakarta Pusat, 10270
      </div>
      <div class="text-lg font-bold col-span-2 md:col-span-1">
        <span class="font-bold">Saluran Informasi</span><br>
        Telepon 021 5703303/57903020 ext. 2115
        Faksimili 021 57333125
        Email kebudayaan@kemdikbud.go.id
      </div>
    </div>
    <div class="cols-span-4 sm:col-span-1 p-2">
      <h3 class="text-lg font-semibold text-gray-800">
        About Us
      </h3>
      <p class="text-gray-800">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
      </p>
    </div>
    <div class="cols-span-4 sm:col-span-1 p-2">
      <h3 class="text-lg font-semibold text-gray-800">
        Contact Us
      </h3>
      <p class="text-gray-800">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
      </p>
    </div>
    <div class="cols-span-4 sm:col-span-1 p-2">
      <h3 class="text-lg font-semibold text-gray-800">
        Join Us
      </h3>
      <p class="text-gray-800">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
      </p>
    </div>
  </div> -->
  <div class="w-full mx-auto my-8 p-8 grid grid-cols-2 gap-4 h-auto">
    <div class="col-span-2 p-2 grid grid-cols-2 gap-4">
        <img src="/storage/kemdikbud.png">
    </div>
    <div class="text-md text-gray-700 col-span-2 md:col-span-1">
      <div class="font-bold mb-1">
        Kementerian Pendidikan dan Kebudayaan
      </div><br>
      Komplek Kementerian Pendidikan dan Kebudayaan<br>
      Jalan Jenderal Sudirman, Senayan<br>
      Jakarta Pusat, 10270
    </div>
    <div class="text-md text-gray-700 col-span-2 md:col-span-1">
      <div class="font-bold mb-1">
        Saluran Informasi
      </div><br>
      Telepon 021 5703303/57903020 ext. 2115<br>
      Faksimili 021 57333125<br>
      Email kebudayaan@kemdikbud.go.id
    </div>
  </div>
</template>

<script>
export default {
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
<style scoped>
  .bg-text {
    background-image: url('/storage/bg-text.png');
    background-position: center;
  }
</style>
