<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <Slider />
          <Penerima :penerima="penerima"/>
          <TextBg />
          <Komite />
          <News />
          <Footer />
        </div>
      </div>
    </div>
  </fbk-layout>
</template>

<script>
  import FbkLayout from './../Layouts/FbkLayout'
  import Slider from './../Components/Slider'
  import Penerima from './../Components/Penerima'
  import TextBg from './../Components/TextBg'
  import Komite from './../Components/Komite'
  import News from './../Components/News'
  import Footer from './../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Slider,
      Penerima,
      TextBg,
      Komite,
      News,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        penerima: this.data.penerima
      }
    }
  }
</script>
