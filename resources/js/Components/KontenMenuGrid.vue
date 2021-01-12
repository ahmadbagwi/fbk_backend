<template>
  <div>
    <div class="flex flex-row h-full w-auto">
      <div class="py-4 px-4 md:py-20 text-gray-700 flex md:flex-1 grid grid-cols-4 gap-6 md:gap-4">
        <div class="col-span-2 md:col-span-1 p-4 w-40 rounded-md hover:shadow-none cursor-pointer shadow-md bg-gray-300 flex-column mx-auto border-2 border-gray-400">
          <inertia-link href="/admin/profil">
            <div class="icon text-center text-4xl md:text-6xl font-bold">
              &#128195;
            </div>
            <div class="judul text-center text-md md:text-2xl font-bold">
              Profil Penerima
            </div>
          </inertia-link>
        </div>
        <div class="col-span-2 md:col-span-1 p-4 w-40 rounded-md hover:shadow-none cursor-pointer shadow-md bg-gray-300 flex-column mx-auto border-2 border-gray-400">
          <inertia-link href="/admin/blog">
            <div class="icon text-center text-4xl md:text-6xl font-bold">
              &#128203;
            </div>
            <div class="judul text-center text-md md:text-2xl font-bold">
              Blog
            </div>
          </inertia-link>
        </div>
        <div class="col-span-2 md:col-span-1 p-4 w-40 rounded-md hover:shadow-none cursor-pointer shadow-md bg-gray-300 flex-column mx-auto border-2 border-gray-400">
          <inertia-link href="/filemanager">
            <div class="icon text-center text-4xl md:text-6xl font-bold">
              &#128194;
            </div>
            <div class="judul text-center text-md md:text-2xl font-bold">
              File Manager
            </div>
          </inertia-link>
        </div>
        <div class="col-span-2 md:col-span-1 p-4 w-40 rounded-md hover:shadow-none cursor-pointer shadow-md bg-gray-300 flex-column mx-auto border-2 border-gray-400">
          <inertia-link href="/user/profile">
            <div class="icon text-center text-md md:text-4xl md:text-6xl font-bold">
              &#128100;
            </div>
            <div class="judul text-center text-2xl font-bold">
              Akun
            </div>
          </inertia-link>
        </div>
      </div>
    </div>
  </div>
</template>