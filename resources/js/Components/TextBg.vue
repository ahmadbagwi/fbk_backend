<template>
  <div class="w-full mx-auto bg-text md:my-8 my-8 p-8 grid grid-cols-2 gap-4 px-18 h-auto md:h-auto">
    <div class="col-span-2 sm:col-span-1 p-2">
      <h2 class="text-3xl text-gray-200">
        APA ITU <span class="font-bold">FBK 2020-</span>
      </h2>
      <p class="text-xl text-gray-100 leading-10">
        <span class="font-bold text-2xl">Fasilitasi Bidang Kebudayaan</span> adalah kegiatan pendukungan berupa fasilitasi dana hibah yang diberikan kepada suatu kelompok kebudayaan atau perseorangan, tidak diperuntukan untuk pembangunan fisik dan non-komersial, serta dapat dimanfaatkan langsung oleh masyarakat maupun pihak-pihak yang terkait bidang kebudayaan (stakeholder) untuk mendorong upaya pemajuan kebudayaan secara langsung dan menyeluruh.
      </p>
    </div>
    <div class="col-span-2 sm:col-span-1 p-2">
      <div class="flex flex-col">
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Latar Belakang
          </h3>
          <p class="text-gray-100 break-normal text-sm">
            UUD 1945 dalam Pasal 32, yaitu “Pemerintah memajukan kebudayaan nasional Indonesia”, menekankan adanya keterlibatan langsung oleh pemerintah selaku penyusun kebijakan di bidang kebudayaan. Melalui Kongres Kebudayaan Indonesia (KKI) yang diselenggarakan pada tahun 2018, disepakati 7 (tujuh) agenda strategis Pemajuan Kebudayaan guna memajukan kebudayaan di Indonesia. Fasilitasi Bidang Kebudayaan (FBK) menjadi salah satu program yang dapat menjalankan amanat ketujuh agenda tersebut karena dampaknya dapat dimanfaatkan langsung oleh masyarakat, terutama dalam upaya pemajuan kebudayaan di Indonesia
          </p>
        </div>
        <div class="p-2 border-b-2 border-gray-100">
          <h3 class="text-lg font-semibold text-gray-200">
            Strategi Kebudayaan
          </h3>
          <p class="text-gray-100 break-normal text-sm">
            “Indonesia Bahagia berlandaskan keanekaragaman budaya yang mencerdaskan, mendamaikan dan menyejahterakan rakyat Indonesia seluruhnya” disepakati sebagai visi pemajuan kebudayaan 20 tahun ke depan. Oleh karena itu dalam penyusunannya, Strategi Pemajuan Kebudayaan dilandaskan kepada Trisakti, yakni asas berdaulat dalam politik, mandiri dalam ekonomi, dan berkepribadian dalam kebudayaan. FBK menjadi salah satu upaya yang dianggap dapat menjadi wadah untuk menjalankan amanat tujuh agenda strategis kebudayaan, yang menempatkan masyarakat sebagai pemilik dan penggerak kebudayaan nasional. Masyarakat adalah unsur yang paling utama untuk memajukan ekosistem kebudayaan di daerahnya masing-masing, hingga nantinya berujung ke pemajuan kebudayaan secara nasional.
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
    background-image: url('static/bg-text.png');
    background-position: center;
    background-size: cover;
  }
</style>
