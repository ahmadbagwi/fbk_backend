<template>
    <!-- <button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot></slot>
      </button> -->
  <button :type="type" class="inline-flex items-center px-4 py-2 my-1 bg-green-600 border-b-2 border-green-800 rounded-lg text-md text-white tracking-widest hover:bg-orange-700 hover:shadow-lg active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
    <slot></slot>
  </button>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        default: 'submit',
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
