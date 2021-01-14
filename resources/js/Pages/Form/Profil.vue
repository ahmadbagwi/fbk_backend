<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Profil
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Data Penerima
                </template>
                <template #description>
                  <div class="mx-4 w-40 max-w-40 berita-create inline">
                    <inertia-link href="/admin/profil">
                      <button class="flex w-24 max-w-24 text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
                      &#8656; &nbsp;Kembali
                      </button>
                    </inertia-link>
                  </div>
                </template>
                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nama_penerima" value="Nama Penerima" />
                      <jet-input id="nama_penerima" type="text" class="mt-1 block w-full" v-model="form.nama_penerima" />
                      <jet-input-error :message="errors.nama_penerima" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nama_project" value="Nama Project" />
                      <jet-input id="nama_project" type="text" class="mt-1 block w-full" v-model="form.nama_project" autocomplete="nama project" />
                      <jet-input-error :message="errors.nama_project" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kategori" value="Kategori" />
                      <select v-model="form.kategori" id="kategori" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="Dokumentasi Karya/Pengetahuan Maestro">Dokumentasi Karya/Pengetahuan Maestro</option>
                        <option value="Penciptaan Karya Kreatif Inovatif">Penciptaan Karya Kreatif Inovatif</option>
                        <option value="Pendayagunaan Ruang Publik">Pendayagunaan Ruang Publik</option>
                      </select>
                      <jet-input-error :message="errors.kategori" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="foto" value="Foto" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager1">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="foto" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.foto" readonly/>
                        <jet-input-error :message="errors.foto" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.foto" />
                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="foto_penerima" value="Foto Penerima" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager2">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="ktp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.foto_penerima" readonly/>
                        <jet-input-error :message="errors.foto_penerima" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.foto_penerima" />
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="waktu" value="Waktu" />
                      <jet-input id="waktu" type="text" class="mt-1 block w-full" v-model="form.waktu" autocomplete="waktu (durasi project)" />
                      <jet-input-error :message="errors.waktu" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nominal_diajukan" value="Nomina diajukan" />
                      <jet-input id="nominal_diajukan" type="number" class="mt-1 block w-full" v-model="form.nominal_diajukan" autocomplete="nominal diajukan" />
                      <jet-input-error :message="errors.nominal_diajukan" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nominal_disetujui" value="Nomina disetujui" />
                      <jet-input id="nominal_disetujui" type="number" class="mt-1 block w-full" v-model="form.nominal_disetujui" autocomplete="nominal disetujui" />
                      <jet-input-error :message="errors.nominal_disetujui" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="deskrisi" value="Deskripsi" />
                      <!-- <ckeditor v-model="form.deskripsi" :config="editorConfig"></ckeditor> -->
                      <wysiwyg v-model="form.deskripsi" />
                      <jet-input-error :message="errors.deskripsi" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kata_kunci" value="Kata Kunci" />
                      <jet-input id="kata_kunci" type="text" class="mt-1 block w-full" v-model="form.kata_kunci" />
                      <jet-input-error :message="errors.kata_kunci" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="profil_penerima" value="Profil Penerima" />
                      <!-- <ckeditor v-model="form.profil_penerima"></ckeditor> -->
                      <wysiwyg v-model="form.profil_penerima" />
                      <jet-input-error :message="errors.profil_penerima" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kontak" value="Kontak" />
                      <jet-input id="kontak" type="text" class="mt-1 block w-full" v-model="form.kontak" />
                      <jet-input-error :message="errors.kontak" class="mt-2" />
                    </div>
                    <div class="col-span-6">
                      <span class="text-lg font-bold text-center my-2">Media sosial</span>
                      <div class="flex flex-wrap my-2 md:justify-between">
                        <jet-label for="" value="Akun FB" class="w-auto mr-1"/>
                        <jet-input id="akun_facebook" type="text" class="mt-1 block w-auto mr-2" v-model="akun_facebook" />
                        <jet-label for="" value="URL FB" class="w-auto mr-1"/>
                        <jet-input id="url_facebook" type="text" class="mt-1 block w-auto" v-model="url_facebook" />
                      </div>
                      <div class="flex flex-wrap my-2 md:justify-between">
                        <jet-label for="" value="Akun Twitter" class="w-auto mr-1"/>
                        <jet-input id="akun_twitter" type="text" class="mt-1 block w-auto mr-2" v-model="akun_twitter" />
                        <jet-label for="" value="URL Twitter" class="w-auto mr-1"/>
                        <jet-input id="url_twitter" type="text" class="mt-1 block w-auto" v-model="url_twitter" />
                      </div>
                      <div class="flex flex-wrap my-2 md:justify-between">
                        <jet-label for="" value="Akun Instagram" class="w-auto mr-1"/>
                        <jet-input id="akun_intagram" type="text" class="mt-1 block w-auto mr-2" v-model="akun_instagram" />
                        <jet-label for="" value="URL Instagram" class="w-auto mr-1"/>
                        <jet-input id="url_instagram" type="text" class="mt-1 block w-auto" v-model="url_instagram" />
                      </div>
                      <div class="flex flex-wrap my-2">
                        <jet-label for="" value="URL Youtube" class="w-auto mr-1"/>
                        <jet-input id="url_youtube" type="text" class="mt-1 block w-auto" v-model="url_youtube" />
                      </div>
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
      // ckeditor: CKEditor.component
    },

    data() {
      return {
        akun_facebook: '',
        akun_twitter: '',
        akun_instagram: '',
        url_facebook: '',
        url_twitter: '',
        url_instagram: '',
        url_youtube: '',
        form: this.$inertia.form({
          id: null,
          // user_id: null,
          kategori: null,
          foto: null,
          nama_project: null,
          waktu: null,
          nominal_diajukan: null,
          nominal_disetujui: null,
          deskripsi: null,
          kata_kunci: null,
          foto_penerima: null,
          nama_penerima: null,
          profil_penerima: null,
          kontak: null,
          media_sosial: null,
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),
        editorConfig: {
          // The configuration of the editor.
        }
      }
    },
    computed: {
      gabunganMedsos: function () {
        let gabungan = `${this.akun_facebook},${this.url_facebook},${this.akun_twitter},${this.url_twitter},${this.akun_instagram},${this.url_instagram},${this.url_youtube}`  
        this.form.media_sosial = gabungan
        return gabungan
      },
      // pecahMedsos: function () {
      //   let array_medsos = []
      //   if (this.data !== null) {
      //     array_medsos.push(this.data.media_sosial.split(","))
      //     this.akun_facebook = array_medsos[0][0]
      //     this.url_facebook = array_medsos[0][1]
      //     this.akun_twitter = array_medsos[0][2]
      //     this.url_twitter = array_medsos[0][3]
      //     this.akun_instagram = array_medsos[0][4]
      //     this.url_instagram = array_medsos[0][5]
      //     this.url_youtube = array_medsos[0][6] 
      //   }

      //   return array_medsos
      // }
    },
    created() {
      if (this.data !== null) {
        this.form.id = this.data.id
        // this.form.user_id = this.data.user_id
        this.form.kategori = this.data.kategori
        this.form.foto = this.data.foto
        this.form.nama_project = this.data.nama_project
        this.form.waktu = this.data.waktu
        this.form.nominal_diajukan = this.data.nominal_diajukan
        this.form.nominal_disetujui = this.data.nominal_disetujui
        this.form.deskripsi = this.data.deskripsi
        this.form.kata_kunci = this.data.kata_kunci
        this.form.nama_penerima = this.data.nama_penerima
        this.form.foto_penerima = this.data.foto_penerima
        this.form.profil_penerima = this.data.profil_penerima
        this.form.kontak = this.data.kontak
        this.form.media_sosial = this.data.media_sosial
        
        let array_medsos = []
        array_medsos.push(this.data.media_sosial.split(","))
        this.akun_facebook = array_medsos[0][0]
        this.url_facebook = array_medsos[0][1]
        this.akun_twitter = array_medsos[0][2]
        this.url_twitter = array_medsos[0][3]
        this.akun_instagram = array_medsos[0][4]
        this.url_instagram = array_medsos[0][5]
        this.url_youtube = array_medsos[0][6] 
      
      }
    },

    methods: {
      openFileManager1 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.foto = items[0].url
        }
        return false
      },

      openFileManager2 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.foto_penerima = items[0].url
        }
        return false
      },

      submitForm() {
        this.form.post('/admin/profil/store', {
          preserveScroll: true
        })
      }
    },
  }
</script>
