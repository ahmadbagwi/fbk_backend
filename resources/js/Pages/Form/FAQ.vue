<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        FAQ
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="submitForm">
          <template #title>
            Form FAQ
          </template>
          <template #description>
            <div class="mx-4 w-40 max-w-40 blog-create inline">
              <inertia-link href="/admin/faq">
                <button class="flex w-24 max-w-24 text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
                &#8656; &nbsp;Kembali
                </button>
              </inertia-link>
            </div>
          </template>
          <template #form>
            <div class="col-span-6 sm:col-span-4">
              <jet-label for="judul" value="Pertanyaan" />
              <jet-input id="judul" type="text" class="mt-1 block w-full" v-model="form.judul" autocomplete="judul" />
              <jet-input-error :message="errors.judul" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-5">
              <jet-label for="konten" value="Jawaban" />
              <wysiwyg  v-model="form.konten"/>
              <jet-input-error :message="errors.konten" class="mt-2" />
            </div>
          </template>

          <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
              Tersimpan.
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
      errors: {},
      data: {}
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
          id: null,
          judul: null,
          konten: null,
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),

      }
    },

    created() {
      if (this.data !== null) {
        this.form.id = this.data.id
        this.form.judul = this.data.judul
        this.form.konten = this.data.konten
      }
    },

    methods: {
      submitForm() {
        this.form.post('/admin/faq/store', {
          preserveScroll: true
        })
      },
    },
  }
</script>
