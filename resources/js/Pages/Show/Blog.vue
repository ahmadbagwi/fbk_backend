<template>
  <fbk-layout>
    <div class="py-0">
      <div class="w-full">
        <div class="bg-white overflow-hidden shadow-xl rounded shadow">
          <BlogFull :blog="blog" />
          <Footer />
        </div>
      </div>
    </div>
  </fbk-layout>
</template>

<script>
  import FbkLayout from './../../Layouts/FbkLayout'
  import BlogFull from './../../Components/BlogFull'
  import PenerimaGrid from './../../Components/PenerimaGrid'
  import Footer from './../../Components/Footer'
  export default {
    components: {
      FbkLayout,
      BlogFull,
      PenerimaGrid,
      Footer
    },
    props: {
      data: {},
    },
    data() {
      return {
        blog: this.data,
      }
    },
  }
</script>
