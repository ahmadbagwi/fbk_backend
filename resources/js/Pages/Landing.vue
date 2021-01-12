<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <Slider />
          <Penerima :penerima="penerima" />
          <TextBg />
          <Komite :komite="komite" />
          <BlogGrid :blog="blog"/>
          <FAQGrid :faq="faq" />
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
  import BlogGrid from './../Components/BlogGrid'
  import FAQGrid from './../Components/FAQGrid'
  import Footer from './../Components/Footer'
  export default {
    components: {
      FbkLayout,
      Slider,
      Penerima,
      TextBg,
      Komite,
      BlogGrid,
      FAQGrid,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        penerima: this.data.penerima,
        komite: this.data.komite,
        blog: this.data.blog,
        faq: this.data.faq
      }
    }
  }
</script>
