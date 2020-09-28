<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pengajuan
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-admin-section>

          <template #laman-admin>
            <div>
              <div class="flex items-center bg-yellow-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>Status {{ data.status }}</p>
              </div>
              <jet-form-section @submitted="submitForm">
                <template #form>
                  <div class="col-span-6 sm:col-span-4">
                    <jet-label for="kategori" value="Kategori" />
                    <select id="kategori" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="form.kategori">
                      <option value="Lembaga Organisasi">Lembaga Organisasi</option>
                      <option value="Komunitas">Komunitas</option>
                      <option value="Perseorangan">Perseorangan</option>
                    </select>
                    <jet-input-error :message="form.error('kategori')" class="mt-2" />
                  </div>

                  <div class="col-span-6 sm:col-span-4">
                    <jet-label for="nama_pengusul" value="Nama Pengusul" />
                    <jet-input id="nama_pengusul" type="text" class="mt-1 block w-full" v-model="form.nama_pengusul" autocomplete="nama_pengusul" />
                    <jet-input-error :message="form.error('nama_pengusul')" class="mt-2" />
                  </div>
                </template>
              </jet-form-section>
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
      status: null,
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

        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),

      }
    },

    methods: {


      submitForm() {
        this.form.post('/biodata/store', {
          preserveScroll: true
        })
      }
    },
  }
</script>
