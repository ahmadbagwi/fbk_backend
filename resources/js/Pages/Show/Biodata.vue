<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Biodata Pengusul
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-section>
          <template #title>
            Biodata Pengusul
          </template>

          <template #description>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et aliquam libero. Donec iaculis commodo efficitur. Suspendisse aliquam mollis ipsum, eu dictum nunc fermentum a. Curabitur aliquam lacus nisl, ac rutrum lorem placerat vel. 
            </p>
            <inertia-link  href="/biodata/create" :active="$page.currentRouteName == 'biodata_create'">
              <jet-button>
                Tambah/Ubah Data
              </jet-button>
            </inertia-link >
          </template>

          <template #laman>
            <div v-if="status !== null">
              <div class="flex items-center bg-yellow-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>Status {{ status }}</p>
              </div>
              <table class="table-auto">
                <div>
                  <tr>
                    <td class="border px-4 py-2">Kategori</td>
                    <td class="border px-4 py-2">{{ data.kategori }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Nama</td>
                    <td class="border px-4 py-2">{{ data.nama_pengusul }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Nama Penanggungjawab</td>
                    <td class="border px-4 py-2">{{ data.nama_penanggungjawab }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">KTP</td>
                    <td class="border px-4 py-2">
                      <div class="input-group-btn">
                        <a :href="data.ktp">
                        <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>&nbsp;File
                        </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">SK Kemenkumham</td>
                    <td class="border px-4 py-2">
                      <div class="input-group-btn">
                        <a :href="data.kemenkumham">
                        <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>&nbsp;File
                        </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Akta</td>
                    <td class="border px-4 py-2">
                      <div class="input-group-btn">
                        <a :href="data.akta">
                        <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>&nbsp;File
                        </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">NPWP</td>
                    <td class="border px-4 py-2">
                      <div class="input-group-btn">
                        <a :href="data.npwp">
                        <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                          </svg>&nbsp;File
                        </button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Alamat</td>
                    <td class="border px-4 py-2">{{ data.alamat }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Provinsi</td>
                    <td class="border px-4 py-2">{{ data.provinsi }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Kota</td>
                    <td class="border px-4 py-2">{{ data.kota }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Telp</td>
                    <td class="border px-4 py-2">{{ data.telp }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Email</td>
                    <td class="border px-4 py-2">{{ data.email }}</td>
                  </tr>
                </div>
              </table>
            </div>
            <div v-else>
              <h2>Data belum tersedia</h2>
            </div>
          </template>

          <template #actions>
            <!-- <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Tersimpan.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Simpan
            </jet-button> -->
          </template>
        </laman-section>

        <jet-section-border />
      </div>
    </div>
  </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetButton from './../../Jetstream/Button'
    import LamanSection from './../../Jetstream/LamanSection'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetSecondaryButton from './../../Jetstream/SecondaryButton'
    import JetSectionBorder from './../../Jetstream/SectionBorder'

    export default {
        props: {
          status: null,
          data: {},
        },
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            LamanSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder
        },

        data() {
            return {
                form: this.$inertia.form({
                    kategori: '',
                    nama_pengusul: this.$page.auth.user.name,
                    nama_penananggungjawab: null,
                    ktp: null,
                    kemenkumham: null,
                    akta: null,
                    npwp: null,
                    alamat: null,
                    provinsi: null,
                    kota: null,
                    telp: null,
                    email: this.$page.auth.user.email
                }, {
                    bag: 'submitForm',
                    resetOnSuccess: false,
                }),

            }
        },

        methods: {
          openFileManager () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.ktp = items[0].url
            }
            return false
          },

          openFileManager2 () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.kemenkumham = items[0].url
            }
            return false
          },

          openFileManager3 () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.akta = items[0].url
            }
            return false
          },

          openFileManager4 () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.npwp = items[0].url
            }
            return false
          },

          submitForm() {
            this.form.post('/biodata/store', {
              preserveScroll: true
            })
          }
        },
    }
</script>
