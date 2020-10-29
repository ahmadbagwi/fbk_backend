<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Laporan
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="submitForm">
          <template #title>
            Form Laporan {{ $page.auth.user.kegiatan }}
          </template>

          <template #description>
            <p>Silahkan isi tanggal terima dana, tanggal mulai dan tanggal selesai kegiatan. Kemudian unggah file laporan.<br>
            </p>
          </template>

          <template #form>
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="terima" value="Tanggal Terima Dana" />
              <!-- <jet-input id="terima" type="date" class="mt-1 block w-full" v-model="form.terima" /> -->
              <date-picker v-model="form.terima" type="date" format="DD-MM-YYYY" valueType="YYYY-MM-DD" class="mt-1 block w-full"></date-picker>
              <jet-input-error :message="errors.terima" class="mt-2" />
            </div>

            <div class="col-span-3 sm:col-span-3">
              <jet-label for="mulai" value="Tanggal Pelaksanaan Kegiatan (mulai)" />
              <!-- <jet-input id="mulai" type="date" class="mt-1 block w-full" v-model="form.mulai" /> -->
              <date-picker v-model="form.mulai" type="date" format="DD-MM-YYYY" valueType="YYYY-MM-DD" class="mt-1 block w-full"></date-picker>
              <jet-input-error :message="errors.mulai" class="mt-2" />
            </div>

            <div class="col-span-3 sm:col-span-3">
              <jet-label for="selesai" value="Tanggal Pelaksanaan Kegiatan (selesai)" />
              <!-- <jet-input id="selesai" type="date" class="mt-1 block w-full" v-model="form.selesai" /> -->
              <date-picker v-model="form.selesai" type="date" format="DD-MM-YYYY" valueType="YYYY-MM-DD" class="mt-1 block w-full"></date-picker>
              <jet-input-error :message="errors.selesai" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <div class="input-group">
                <jet-label for="laporan80" value="Laporan 80%" v-if="$page.auth.user.kegiatan=='FBK'"/>
                <jet-label for="laporan80" value="Laporan Awal" v-else />
                <div class="input-group-btn">
                  <button-attach>
                    <span @click.prevent="openFileManager">Pilih/Unggah</span>
                  </button-attach>
                </div>
                <jet-input id="laporan80" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.laporan80" readonly/>
                <jet-input-error :message="errors.laporan80" class="mt-2" />
              </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
              <div class="input-group">
                <jet-label for="laporan20" value="Laporan Akhir 20%"  v-if="$page.auth.user.kegiatan=='FBK'"/>
                <jet-label for="laporan20" value="Laporan Akhir" v-else />
                <div class="input-group-btn">
                  <button-attach>
                    <span @click.prevent="openFileManager2">Pilih/Unggah</span>
                  </button-attach>
                </div>
                <jet-input id="laporan20" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.laporan20" readonly/>
                <jet-input-error :message="errors.laporan20" class="mt-2" />
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
  import DatePicker from 'vue2-datepicker'
  import 'vue2-datepicker/index.css'

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
      DatePicker
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
