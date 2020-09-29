<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pengajuan
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Pengajuan
                </template>

                <template #description>
                  <p>Silahkan lengkapi data anda<br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et aliquam libero. Donec iaculis commodo efficitur. Suspendisse aliquam mollis ipsum, eu dictum nunc fermentum a. Curabitur aliquam lacus nisl, ac rutrum lorem placerat vel. 
                  </p>
                </template>

                <template #form>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="jenis" value="Jenis" />
                      <select id="jenis" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="form.jenis" autocomplete="jenis" >
                        <option value="Dokumentasi Karya Pengetahuan Maestro">Dokumentasi Karya Pengetahuan Maestro</option>
                        <option value="Pendayagunaan Ruang Publik">Pendayagunaan Ruang Publik</option>
                        <option value="Penciptaan Karya Kreatif Inovatif">Penciptaan Karya Kreatif Inovatif</option>
                      </select>
                      <jet-input-error :message="errors.jenis" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="judul" value="Judul" />
                      <jet-input id="judul" type="text" class="mt-1 block w-full" v-model="form.judul" autocomplete="judul" />
                      <jet-input-error :message="errors.judul" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="konsep" value="Konsep" />
                      <wysiwyg  v-model="form.konsep"/>
                      <jet-input-error :message="errors.konsep" class="mt-2" />
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                      <jet-label for="mulai" value="Tanggal Mulai" />
                      <jet-input id="mulai" type="date" class="mt-1 block w-full" v-model="form.mulai" autocomplete="mulai" />
                      <jet-input-error :message="errors.mulai" class="mt-2" />
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                      <jet-label for="selesai" value="Tanggal Selesai" />
                      <jet-input id="selesai" type="date" class="mt-1 block w-full" v-model="form.selesai" autocomplete="selesai" />
                      <jet-input-error :message="errors.selesai" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="tahap1" value="Pelaksanaan Tahap 1" />
                      <wysiwyg  v-model="form.tahap1"/>
                      <jet-input-error :message="errors.tahap1" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="tahap2" value="Pelaksanaan Tahap 2" />
                      <wysiwyg  v-model="form.tahap2"/>
                      <jet-input-error :message="errors.tahap2" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="biaya" value="Biaya" />
                      <jet-input id="biaya" type="text" class="mt-1 block w-full" v-model="form.biaya" />
                      <jet-input-error :message="errors.biaya" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="rab" value="RAB" />
                        <div class="input-group-btn">
                          <button class="flex ext-blue-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" @click.prevent="openFileManager">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                            </svg>Pilih/Unggah
                          </button>
                        </div>
                        <jet-input id="rab" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.rab" autocomplete="rab" readonly/>
                        <jet-input-error :message="errors.rab" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.rab" />

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="video" value="Tautan Video" />
                      <jet-input id="video" type="text" class="mt-1 block w-full" v-model="form.video" />
                      <jet-input-error :message="errors.video" class="mt-2" />
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

              <!-- <delete-user-form class="mt-10 sm:mt-0" /> -->
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    import JetButton from './../../Jetstream/Button'
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
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder
        },

        data() {
            return {
                form: this.$inertia.form({
                    jenis: null,
                    judul: null,
                    konsep: null,
                    mulai: null,
                    selesai: null,
                    tahap1: null,
                    tahap2: null,
                    biaya: null,
                    rab: null,
                    video: null,
                    status: null
                }, {
                    bag: 'submitForm',
                    resetOnSuccess: false,
                }),

            }
        },

        created() {
          if (this.data !== null) {
            this.form.jenis = this.data.jenis
            this.form.judul = this.data.judul
            this.form.konsep = this.data.konsep
            this.form.mulai = this.data.mulai
            this.form.selesai = this.data.selesai
            this.form.tahap1 = this.data.tahap1
            this.form.tahap2 = this.data.tahap2
            this.form.biaya = this.data.biaya
            this.form.rab = this.data.rab
            this.form.video = this.data.video
          }
        },
        
        methods: {
          submitForm() {
            this.form.post('/pengajuan/store', {
              preserveScroll: true
            })
          },

          openFileManager () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.rab = items[0].url
            }
            return false
          },

        },
    }
</script>
