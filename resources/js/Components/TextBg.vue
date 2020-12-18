<template>
  <div class="w-full mx-auto bg-text md:my-8 my-8 p-8 grid grid-cols-2 gap-4 px-18 h-auto md:h-auto">
    <div class="col-span-2 sm:col-span-1 p-2">
      <h2 class="text-3xl text-gray-200">
        APA ITU <span class="font-bold">FBK 2020-</span>
      </h2>
      <p class="text-xl text-gray-100 leading-10">
        <span class="font-bold text-2xl">"Fasilitasi Bidang Kebudayaan</span> adalah salah satu upaya Pemerintah melalui Direktorat Jenderal Kebudayaan Kementerian Pendidikan dan Kebudayaan mewujudkan strategi pemajuan kebudayaan."
      </p>
    </div>
    <div class="col-span-2 sm:col-span-1 p-2">
      <div class="flex flex-col">
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Latar Belakang
          </h3>
          <p class="text-gray-100">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
          </p>
        </div>
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Strategi Kebudayaan
          </h3>
          <p class="text-gray-100">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
          </p>
        </div>
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Pengumuman
          </h3>
          <p class="text-gray-100">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
          </p>
        </div>
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Mekanisme
          </h3>
          <p class="text-gray-100">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec porta felis est, non varius velit placerat id.
          </p>
        </div>
      </div>
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
