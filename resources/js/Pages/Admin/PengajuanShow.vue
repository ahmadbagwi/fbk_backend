<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Pengajuan
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-admin-section>

          <template #laman-admin>
            <div>
              <div class="flex items-center bg-green-400 text-white text-sm font-bold px-4 py-3" role="alert" v-if="status=='Lolos'">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                </svg>
                <p>Status {{ data.status }} &nbsp; {{ data.catatan }}</p>
              </div>
              <div class="flex items-center bg-yellow-500 text-white text-sm font-bold px-4 py-3" role="alert" v-else>
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/>
                </svg>
                <p>Status {{ data.status }} &nbsp; {{ data.catatan }}</p>
              </div>
              <table class="table-auto">
                <div>
                  <tr>
                    <td class="border px-4 py-2">User Id</td>
                    <td class="border px-4 py-2">{{ data.user_id }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Nama</td>
                    <td class="border px-4 py-2">{{ data.name }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Jenis</td>
                    <td class="border px-4 py-2">{{ data.jenis }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Judul</td>
                    <td class="border px-4 py-2">{{ data.judul }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Konsep</td>
                    <td class="border px-4 py-2"><span v-html="data.konsep"></span></td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Tanggal Mulai</td>
                    <td class="border px-4 py-2">{{ data.mulai }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Tanggal Selesai</td>
                    <td class="border px-4 py-2">{{ data.selesai }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Pelaksanaan Tahap 1</td>
                    <td class="border px-4 py-2"><span v-html="data.tahap1"></span></td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Pelaksanaan Tahap 2</td>
                    <td class="border px-4 py-2"><span v-html="data.tahap2"></span></td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">Biaya</td>
                    <td class="border px-4 py-2">{{ data.biaya }}</td>
                  </tr>
                  <tr>
                    <td class="border px-4 py-2">RAB</td>
                    <td class="border px-4 py-2">
                      <div class="input-group-btn">
                        <a :href="data.rab">
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
                    <td class="border px-4 py-2">Video</td>
                    <td class="border px-4 py-2"><a :href="data.video" v-if="data.video" class="text-blue-600">{{ data.video }}</a></td>
                  </tr>
                </div>
              </table>
            </div>

            <jet-section-border />

            <div class="form-verifikasi grid-cols-4 col-span-4 m-2 p-2 bg-gray-200">
              <h2 class="text-md">Form Verifikasi</h2>
              <form @submit.prevent="submitForm" class="m-2 p-2">
                <div class="w-1/2 col-span-2 sm:col-span-2">
                  <jet-label for="status" value="Status" />
                    <select id="status" type="text" class="mt-1 block w-full block appearance-none bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="form.status" required>
                      <option value="Perlu Perbaikan" selected>Perlu Perbaikan</option>
                      <option value="Tidak Lolos">Tidak Lolos</option>
                      <option value="Lolos">Lolos</option>
                    </select>
                  <jet-input-error :message="form.error('status')" class="mt-2" />
                </div>

                <div class="w-1/2 col-span-2 sm:col-span-2">
                  <jet-label for="catatan" value="Catatan" />
                  <jet-input id="catatan" type="text" class="mt-1 block w-full" v-model="form.catatan" />
                  <jet-input-error :message="form.error('catatan')" class="mt-2" />
                  <jet-input id="id" type="hidden" class="mt-1 block w-full" v-model="form.id" required/>
                  <jet-input id="pemeriksa" type="hidden" class="mt-1 block w-full" v-model="form.pemeriksa" required/>
                </div>

                  <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Tersimpan.
                  </jet-action-message>

                  <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Simpan
                  </jet-button>
              </form>
            </div>
          </template>
        </laman-admin-section>
        <jet-section-border />
      </div>
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from './../../Layouts/AppLayout'
  import JetButton from './../../Jetstream/Button'
  import JetFormSection from './../../Jetstream/FormSection'
  import LamanAdminSection from './../../Jetstream/LamanAdminSection'
  import JetInput from './../../Jetstream/Input'
  import JetInputError from './../../Jetstream/InputError'
  import JetLabel from './../../Jetstream/Label'
  import JetActionMessage from './../../Jetstream/ActionMessage'
  import JetSecondaryButton from './../../Jetstream/SecondaryButton'
  import JetSectionBorder from './../../Jetstream/SectionBorder'

  export default {
    props: {
      data: {},
    },
    components: {
      AppLayout,
      JetActionMessage,
      JetButton,
      JetFormSection,
      LamanAdminSection,
      JetInput,
      JetInputError,
      JetLabel,
      JetSecondaryButton,
      JetSectionBorder
    },

    data() {
      return {
        form: this.$inertia.form({
          id: this.data.id,
          status: null,
          catatan: null,
          pemeriksa: this.$page.auth.user.name
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),

      }
    },

    methods: {
      submitForm() {
        this.form.post('/admin/pengajuan/verifikasi', {
          preserveScroll: true
        })
      }
    },
  }
</script>
