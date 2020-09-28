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
                      <jet-label for="terima" value="Tanggal Terima Dana" />
                      <jet-input id="terima" type="date" class="mt-1 block w-full" v-model="form.terima" />
                      <jet-input-error :message="errors.terima" class="mt-2" />
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                      <jet-label for="mulai" value="Tanggal Pelaksanaan Kegiatan (mulai)" />
                      <jet-input id="mulai" type="date" class="mt-1 block w-full" v-model="form.mulai" />
                      <jet-input-error :message="errors.mulai" class="mt-2" />
                    </div>

                    <div class="col-span-3 sm:col-span-3">
                      <jet-label for="selesai" value="Tanggal Pelaksanaan Kegiatan (selesai)" />
                      <jet-input id="selesai" type="date" class="mt-1 block w-full" v-model="form.selesai" />
                      <jet-input-error :message="errors.selesai" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="laporan80" value="Laporan 80%" />
                        <div class="input-group-btn">
                          <button class="flex ext-blue-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" @click.prevent="openFileManager">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                            </svg>Pilih/Unggah
                          </button>
                        </div>
                        <jet-input id="laporan80" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.laporan80" readonly/>
                        <jet-input-error :message="errors.laporan80" class="mt-2" />
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="laporan20" value="Laporan 20%" />
                        <div class="input-group-btn">
                          <button class="flex ext-blue-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" @click.prevent="openFileManager2">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                            </svg>Pilih/Unggah
                          </button>
                        </div>
                        <jet-input id="laporan20" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.laporan20" readonly/>
                        <jet-input-error :message="errors.laporan20" class="mt-2" />
                      </div>
                    </div>
                    
                </template>

                <template #actions>
                  <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    <span v-if="errors">
                      Terdapat kesalahan harap periksa kembali input anda
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
                    terima: null,
                    mulai: null,
                    selesai: null,
                    laporan80: null,
                    laporan20: null,
                }, {
                    bag: 'submitForm',
                    resetOnSuccess: false,
                }),

            }
        },

        created() {
          if (this.data !== null) {
            this.form.terima = this.data.terima
            this.form.mulai = this.data.mulai
            this.form.selesai = this.data.selesai
            this.form.laporan80 = this.data.laporan80
            this.form.laporan20 = this.data.laporan20
          }
        },

        methods: {
          submitForm() {
            this.form.post('/laporan/store', {
              preserveScroll: true
            })
          },

          openFileManager () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.laporan80 = items[0].url
            }
            return false
          },

          openFileManager2 () {
            window.open(`/laravel-filemanager`, 'width=900,height=600')
            var self = this
            window.SetUrl = function (items) {
              self.form.laporan20 = items[0].url
            }
            return false
          },

        },
    }
</script>
