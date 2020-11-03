<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Form Administrasi
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Administrasi
                </template>

                <template #description>
                  <p>Silahkan lengkapi formulir administrasi<br>
                  </p>
                </template>

                <template #form>

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="permohonan" value="Surat Permohonan" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="permohonan" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.permohonan"  readonly/>
                        <jet-input-error :message="errors.permohonan" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.permohonan" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="proposal" value="Proposal" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager2">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="proposal" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.proposal"  readonly/>
                        <jet-input-error :message="errors.proposal" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.proposal" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="pertanggungjawaban" value="Surat Pertanggung Jawaban Mutlak" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager3">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="pertanggungjawaban" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.pertanggungjawaban" readonly/>
                        <jet-input-error :message="errors.pertanggungjawaban" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.pertanggungjawaban" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="kesanggupan" value="Surat Kesanggupan Melaksanakan FBK" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager4">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="kesanggupan" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.kesanggupan" readonly/>
                        <jet-input-error :message="errors.kesanggupan" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.kesanggupan" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="rekening" value="Foto/scan Rekening" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager5">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="rekening" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.rekening" readonly/>
                        <jet-input-error :message="errors.rekening" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.rekening" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="npwp" value="Foto/scan NPWP" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager6">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="npwp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.npwp" readonly/>
                        <jet-input-error :message="errors.npwp" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.npwp" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="ktp" value="Foto/scan KTP" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager7">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="ktp" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.ktp" readonly/>
                        <jet-input-error :message="errors.ktp" class="mt-2" />
                        <legend class="text-gray-500 text-sm">*Lembaga – organisasi   unggah KTP ketua , sekretaris, bendahara </legend>
                      </div>
                    </div>
                    <img class="mt-3" :src="form.ktp" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="kk" value="Foto/scan KK" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager8">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="kk" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.kk" readonly/>
                        <jet-input-error :message="errors.kk" class="mt-2" />
                        <legend class="text-gray-500 text-sm">*Lembaga – organisasi   unggah KK ketua , sekretaris, bendahara </legend>
                      </div>
                    </div>
                    <img class="mt-3" :src="form.kk" />
                    
                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="integritas" value="Pakta Integritas" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager9">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="integritas" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.integritas" readonly/>
                        <jet-input-error :message="errors.integritas" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.integritas" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="riwayat" value="Riwayat Hidup" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager10">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="riwayat" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.riwayat" readonly/>
                        <jet-input-error :message="errors.riwayat" class="mt-2" />
                        <legend class="text-gray-500 text-sm">*Lembaga – organisasi   unggah riwayat hidup ketua , sekretaris, bendahara </legend>
                      </div>
                    </div>
                    <img class="mt-3" :src="form.riwayat" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="politik" value="Surat Tidak Terkait Partai Politik" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager11">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="politik" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.politik" readonly/>
                        <jet-input-error :message="errors.politik" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.politik" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="domisili" value="Surat Keterangan Domisili" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager12">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="domisili" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.domisili" readonly/>
                        <jet-input-error :message="errors.domisili" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.domisili" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="komunitas" value="Profil Komunitas/lembaga" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager13">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="komunitas" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.komunitas" readonly/>
                        <jet-input-error :message="errors.komunitas" class="mt-2" />
                      </div>
                    </div>
                    <img class="mt-3" :src="form.komunitas" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="kesekretariatan" value="Kesekretariatan" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager14">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="kesekretariatan" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.kesekretariatan" readonly/>
                        <jet-input-error :message="errors.kesekretariatan" class="mt-2" />
                        <legend class="text-gray-500 text-sm">*Struktur organisasi, jumlah anggota, foto sekretariat, papan nama </legend>
                      </div>
                    </div>
                    <img class="mt-3" :src="form.kesekretariatan" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="prestasi" value="Kegiatan & Prestasi" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager15">
                            <button-attach>
                              Pilih/Unggah
                            </button-attach>
                          </div>
                        </div>
                        <jet-input id="prestasi" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.prestasi" readonly/>
                        <jet-input-error :message="errors.prestasi" class="mt-2" />
                        <legend class="text-gray-500 text-sm">*Foto dan lampiran prestasi </legend>
                      </div>
                    </div>
                    <img class="mt-3" :src="form.prestasi" />

                    <div class="col-span-6 sm:col-span-4">
                      <div class="input-group">
                        <jet-label for="akta" value="Akta Pendirian & SK Kemenkumham" />
                        <div class="input-group-btn">
                          <div @click.prevent="openFileManager16">
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
    },

    data() {
      return {
        form: this.$inertia.form({
          permohonan: null,
          proposal: null,
          pertanggungjawaban: null,
          kesanggupan: null,
          rekening: null,
          npwp: null,
          ktp: null,
          kk: null,
          integritas: null,
          riwayat: null,
          politik: null,
          domisili: null,
          komunitas: null,
          kesekretariatan: null,
          prestasi: null,
          akta:null
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),

      }
    },

    created() {
      if (this.data !== null) {
        this.form.permohonan = this.data.permohonan
        this.form.proposal = this.data.proposal
        this.form.pertanggungjawaban = this.data.pertanggungjawaban
        this.form.kesanggupan = this.data.kesanggupan
        this.form.rekening = this.data.rekening
        this.form.npwp = this.data.npwp
        this.form.ktp = this.data.ktp
        this.form.kk = this.data.kk
        this.form.integritas = this.data.integritas
        this.form.riwayat = this.data.riwayat
        this.form.politik = this.data.politik
        this.form.domisili = this.data.domisili
        this.form.komunitas = this.data.komunitas
        this.form.riwayat = this.data.riwayat
        this.form.kesekretariatan = this.data.kesekretariatan
        this.form.prestasi = this.data.prestasi
        this.form.akta = this.data.akta
      }
    },

    methods: {
      submitForm() {
        this.form.post('/administrasi/store', {
          preserveScroll: true
        })
      },

      openFileManager () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.permohonan = items[0].url
        }
        return false
      },

      openFileManager2 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.proposal = items[0].url
        }
        return false
      },

      openFileManager3 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.pertanggungjawaban = items[0].url
        }
        return false
      },

      openFileManager4 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.kesanggupan = items[0].url
        }
        return false
      },

      openFileManager5 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.rekening = items[0].url
        }
        return false
      },

      openFileManager6 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.npwp = items[0].url
        }
        return false
      },

      openFileManager7 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.ktp = items[0].url
        }
        return false
      },

      openFileManager8 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.kk = items[0].url
        }
        return false
      },

      openFileManager9 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.integritas = items[0].url
        }
        return false
      },

      openFileManager10 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.riwayat = items[0].url
        }
        return false
      },

      openFileManager11 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.politik = items[0].url
        }
        return false
      },

      openFileManager12 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.domisili = items[0].url
        }
        return false
      },

      openFileManager13 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.komunitas = items[0].url
        }
        return false
      },

      openFileManager14 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.kesekretariatan = items[0].url
        }
        return false
      },

      openFileManager15 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.prestasi = items[0].url
        }
        return false
      },

      openFileManager16 () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.akta = items[0].url
        }
        return false
      },

    },
  }
</script>
