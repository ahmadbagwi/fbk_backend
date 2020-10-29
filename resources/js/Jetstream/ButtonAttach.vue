<template>
  <button :type="type" class="inline-flex ibg-blue-500 hover:bg-orange-500 hover:shadow-md text-md text-white shadow my-1 py-1 px-2 border-b-2 border-blue-700 hover:border-blue-800 rounded-lg items-center transition ease-in-out duration-150">
    <b-icon icon="paperclip"></b-icon>
    <slot></slot>
  </button>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        default: 'button',
      },
    }
  }
</script>
<style scoped>
  .bg-biru {
    background-color: #1D7CBF!important;
  }

  .bg-oren {
    background-color: #F7A31C;
  }

  .text-oren {
    color: #F7A31C;
    font-weight: 700;
  }
</style>