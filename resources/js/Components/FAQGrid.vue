<template>
  <div class="w-full mx-auto my-8">
    <div class="title text-center py-4">
      <h2 class="text-3xl">
        -FAQ <span class="font-bold">FBK-</span>
      </h2>
    </div>
    <div class="grid grid-cols-1 gap-6 mt-10 px-10">
      <div class="col-span-1 shadow-md rounded-lg p-4">
        <div class="text-gray-800 text-center text-sm px-1">
          <ul class="list-none px-0 font-bold text-center py-4">
            <div v-for="list in faq" :key="list.id">
              <div id="text-faq" class="group">
                <div @click.prevent="showFaq(list.id)" class="flex justify-between p-2 text-md md:text-lg border border-white bg-gray-100 p-1 hover:bg-gray-200 hover:text-blue-500 cursor-pointer">
                  {{ list.judul }} <span class="text-right">&#128315;</span>
                </div>
                <div v-show="show == list.id" class="flex p-2 text-sm font-semibold text-gray-600">
                  <span v-html="list.konten"></span>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
      
    </div>
  </div>

</template>

<script>
export default {
  props: {
    faq: {}
  },
  data () {
    return {
      show: false
    }
  },
  methods: {
    showFaq (id) {
      this.show = id
    }
  }
}
</script>
