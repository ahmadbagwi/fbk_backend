<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Biodata Pengusul
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Data Pengusul
                </template>

                <template #description>
                  <p>Silahkan lengkapi data formulir biodata pengusul<br>
                  </p>
                </template>

                <template #form>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kategori" value="Kategori" />
                      <select id="kategori" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="form.kategori">
                        <option value="Lembaga Organisasi">Lembaga Organisasi</option>
                        <option value="Komunitas">Komunitas</option>
                        <option value="Perseorangan">Perseorangan</option>
                      </select>
                      <jet-input-error :message="errors.kategori" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nama_pengusul" value="Nama Pengusul" />
                      <jet-input id="nama_pengusul" type="text" class="mt-1 block w-full" v-model="form.nama_pengusul" autocomplete="nama_pengusul" />
                      <jet-input-error :message="errors.nama_pengusul" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nama_penanggungjawab" value="Nama Penananggungjawab" />
                      <jet-input id="nama_penanggungjawab" type="text" class="mt-1 block w-full" v-model="form.nama_penanggungjawab" autocomplete="nama_penanggungjawab" />
                      <jet-input-error :message="errors.nama_penanggungjawab" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="ktp" value="KTP" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="ktp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.ktp" readonly/>
                        <jet-input-error :message="errors.ktp" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.ktp" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="kemenkumham" value="SK Kemenkumham" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager2">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="kemenkumham" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.kemenkumham" readonly/>
                        <jet-input-error :message="errors.kemenkumham" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.kemenkumham" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="akta" value="Akta" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager3">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="akta" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.akta" readonly/>
                        <jet-input-error :message="errors.akta" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.akta" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="npwp" value="NPWP" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager4">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="npwp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.npwp" readonly />
                        <jet-input-error :message="errors.npwp" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.npwp" />

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="alamat" value="Alamat" />
                      <jet-input id="alamat" type="text" class="mt-1 block w-full" v-model="form.alamat" autocomplete="alamat" />
                      <jet-input-error :message="errors.alamat" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="provinsi" value="Provinsi" />
                      <jet-input id="provinsi" type="text" class="mt-1 block w-full" v-model="form.provinsi" autocomplete="provinsi" />
                      <jet-input-error :message="errors.provinsi" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kota" value="Kota" />
                      <jet-input id="kota" type="text" class="mt-1 block w-full" v-model="form.kota" autocomplete="kota" />
                      <jet-input-error :message="errors.kota" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="telp" value="Telp" />
                      <jet-input id="telp" type="text" class="mt-1 block w-full" v-model="form.telp" autocomplete="telp" />
                      <jet-input-error :message="errors.telp" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="email" value="Email" />
                      <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" readonly />
                      <jet-input-error :message="errors.email" class="mt-2" />
                    </div>
                  </template>

                  <template #actions>
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                      <span v-if="errors">
                        Error periksa kembali input anda
                      </span>
                      <span v-else>
                        Tersimpan
                      </span>
                    </jet-action-message>

                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                      Simpan
                    </jet-button>
                  </template>
                </jet-form-section>

                <jet-section-border />
            </div>
        </div>
    </app-layout>
</template>

<script>
  import AppLayout from './../../Layouts/AppLayout'
  import JetButton from './../../Jetstream/Button'
  import ButtonAttach from './../../Jetstream/ButtonAttach'
  import JetFormSection from './../../Jetstream/FormSection'
  import JetInput from './../../Jetstream/Input'
  import JetInputError from './../../Jetstream/InputError'
  import JetLabel from './../../Jetstream/Label'
  import JetActionMessage from './../../Jetstream/ActionMessage'
  import JetSecondaryButton from './../../Jetstream/SecondaryButton'
  import JetSectionBorder from './../../Jetstream/SectionBorder'

  export default {
    props: {
      message: '',
      data: {},
      errors: {}
    },

    components: {
      AppLayout,
      JetActionMessage,
      JetButton,
      ButtonAttach,
      JetFormSection,
      JetInput,
      JetInputError,
      JetLabel,
      JetSecondaryButton,
      JetSectionBorder,
    },

    data() {
      return {
        form: this.$inertia.form({
          kategori: null,
          nama_pengusul: this.$page.auth.user.name,
          nama_penanggungjawab: '',
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

    created() {
      if (this.data !== null) {
        this.form.kategori = this.data.kategori
        this.form.nama_pengusul = this.data.nama_pengusul
        this.form.nama_penanggungjawab = this.data.nama_penanggungjawab
        this.form.ktp = this.data.ktp
        this.form.kemenkumham = this.data.kemenkumham
        this.form.akta = this.data.akta
        this.form.npwp = this.data.npwp
        this.form.alamat = this.data.alamat
        this.form.provinsi = this.data.provinsi
        this.form.kota = this.data.kota
        this.form.telp = this.data.telp
        this.form.email = this.data.email
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
