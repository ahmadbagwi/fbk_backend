<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Slider
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Slider
                </template>
                <template #description>
                  <div class="mx-4 w-40 max-w-40 berita-create inline">
                    <inertia-link href="/admin/slider">
                      <button class="flex w-24 max-w-24 text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
                      &#8656; &nbsp;Kembali
                      </button>
                    </inertia-link>
                  </div>
                </template>
                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="nama" value="Nama " />
                      <jet-input id="nama" type="text" class="bg-gray-200 mt-1 block w-full" v-model="form.nama" autocomplete="nama" readonly />
                      <jet-input-error :message="errors.nama" class="mt-2" />
                    </div>
                    <!-- <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="nilai" value="Slider 1" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager1">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="foto" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.nilai[0]" readonly/>
                        <jet-input-error :message="errors.nilai" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.nilai" />
                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="nilai" value="Slider 2" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager2">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="ktp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.nilai[1]" readonly/>
                        <jet-input-error :message="errors.nilai" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.nilai" /> -->
                    <div class="col-span-6 sm:col-span-4 block" @click.prevent="jumlahFoto++">
                      <button class="rounded p-2 text-white bg-blue-600">
                        Tambah Foto
                      </button>
                    </div>
                    <div class="block col-span-6" v-if="jumlahFoto > 0">
                      <div class="col-span-4 sm:col-span-3" v-for="(n,i) in (jumlahFoto)" :key="i">
                        <div class="input-group">
                          <jet-label for="foto[]" value="Slider" />
                          <div class="input-group-btn">
                            <button class="flex ext-blue-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" @click.prevent="ulfm(i)">
                               Pilih/Unggah
                            </button>
                          </div>
                          <jet-input id="nilai[]" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.nilai[i]" readonly/>
                        </div>
                        <img class="mt-3 object-contain" :src="form.nilai[i]" />
                      </div>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                      <jet-label value="Status" />
                      <input type="radio" id="terbit" name="status" value="terbit" v-model="form.status" required>
                      <label for="terbit">Terbit</label><br>
                      <input type="radio" id="draft" name="status" value="draft" v-model="form.status">
                      <label for="draft">Draft</label><br>
                      <jet-input-error :message="errors.status" class="mt-2" />
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
      JetSectionBorder
      // ckeditor: CKEditor.component
    },

    data() {
      return {
        form: this.$inertia.form({
          id: null,
          nama: 'slider',
          output: 'gambar',
          nilai: [],
          status: null,
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),
        editorConfig: {
          // The configuration of the editor.
        },
        jumlahFoto: 0
      }
    },
    created() {
      if (this.data !== null) {
        this.form.id = this.data.id
        this.form.nama = this.data.nama
        this.form.output = this.data.output
        this.form.status = this.data.status
        
        // let array_medsos = []
        // array_medsos.push(this.data.media_sosial.split(","))
        // this.form.akun_facebook = array_medsos[0][0]
        // this.form.url_facebook = array_medsos[0][1]

      
      }
    },
    methods: {
      ulfm(i) {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.nilai[i] = items[0].url
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
        setTimeout(() => {
          this.jumlahFoto++
        }, 1000)
        this.form.post('/admin/slider/store', {
          preserveScroll: true
        })
      }
    },
  }
</script>
