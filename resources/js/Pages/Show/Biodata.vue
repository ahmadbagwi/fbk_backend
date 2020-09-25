<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Pengusul
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-section>
          <template #title>
            Data Pengusul
          </template>

          <template #description>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et aliquam libero. Donec iaculis commodo efficitur. Suspendisse aliquam mollis ipsum, eu dictum nunc fermentum a. Curabitur aliquam lacus nisl, ac rutrum lorem placerat vel. 
            </p>
            <jet-button>
              <inertia-link  href="/biodata/create" :active="$page.currentRouteName == 'biodata_create'">
                Tambah/Ubah Data
              </inertia-link >
            </jet-button>
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
                    <td class="border px-4 py-2">{{ data.nama_penananggungjawab }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">KTP</td>
                    <td class="border px-4 py-2">
                      <div class="bg-gray-400">
                        <img :src="data.ktp" class="object-contain h-48 w-full">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">SK Kemenkumham</td>
                    <td class="border px-4 py-2">
                      <div class="bg-gray-400">
                        <img :src="data.kemenkumham" class="object-contain h-48 w-full">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Akta</td>
                    <td class="border px-4 py-2">
                      <div class="bg-gray-400">
                        <img :src="data.akta" class="object-contain h-48 w-full">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">NPWP</td>
                    <td class="border px-4 py-2">
                      <div class="bg-gray-400">
                        <img :src="data.npwp" class="object-contain h-48 w-full">
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
