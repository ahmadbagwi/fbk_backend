<template>
  <div class="">
    <!-- <nav id="header" class="h-auto bg-gray-800 w-full text-white z-10">
      <div class="w-4/5  mx-auto h-auto flex flex-wrap items-center justify-between py-2">
        <div class="w-2/5 lg:w-auto block lg:hidden px-1 text-right">
          <button id="nav-toggle" class="items-center p-1 text-orange-800 hover:text-gray-900 group text-right">
            <span class="cursor-pointer text-gray-200">&#9776; Menu</span>
            <ul class="list-none hidden group-focus:inline-block active:inline-block text-xs bg-gray-100 p-1 rounded shadow">
              <li class="hover:bg-gray-200">
                <jet-nav-link href="/" class="inline-block py-2 px-4 hover:border-b hover:border-gray-100 font-bold no-underline">
                  Beranda
                </jet-nav-link>
              </li>
              <li class="hover:bg-gray-200">
                <jet-nav-link href="/login" class="inline-block py-2 px-4 font-bold no-underline">
                  Tentang FBK
                </jet-nav-link >
              </li>
            </ul>
          </button>
        </div>
        <div id="nav-content" class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white lg:bg-transparent text-black">
          <ul class="list-none list-reset lg:flex justify-start flex-1 p-0">
            <li class="mr-3">
              <jet-nav-link href="/" class="inline-block px-4 text-gray-100 hover:bg-gray-700 rounded p-1">
                Beranda
              </jet-nav-link>
            </li>
            <li class="mr-3">
              <jet-nav-link href="/tentang" class="inline-block px-4 text-gray-100 hover:bg-gray-700 rounded p-1">
                Tentang FBK
              </jet-nav-link>
            </li>
            <li class="mr-3">
              <jet-nav-link href="/tentang" class="inline-block px-4 text-gray-100 hover:bg-gray-700 rounded p-1">
                Cari
              </jet-nav-link>
            </li>
            <li class="mr-3 cursor-pointer">
              <span class="inline-block px-4 text-gray-100 hover:bg-gray-700 rounded p-1">
                Log Out
              </span>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->
    <main>
      <div class="w-full lg:w-4/5 mx-auto mt-4 sm:mt-0 py-4 px-2 md:py-0 md:px-6">
        <slot></slot>
      </div>
    </main>
    <portal-target name="modal" multiple>
    </portal-target>
  </div>
</template>

<script>
import JetNavLink from './../Jetstream/NavLink'
export default {
  components: {
    JetNavLink
  },

  data () {
    return {
      data: {}
    }
  },

  created() {
    console.log(this.$page.currentRouteName)
  },
}
</script>
