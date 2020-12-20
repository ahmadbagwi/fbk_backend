<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Berita
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <jet-form-section @submitted="submitForm">
          <template #title>
            Form Blog
          </template>
          <template #description>
            <div class="mx-4 w-40 max-w-40 berita-create inline">
              <inertia-link href="/admin/berita">
                <button class="flex w-24 max-w-24 text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
                &#8656; &nbsp;Kembali
                </button>
              </inertia-link>
            </div>
          </template>
          <template #form>
            <div class="col-span-3 sm:col-span-3">
              <jet-label for="tanggal" value="Tanggal" />
              <jet-input id="tanggal" type="date" class="mt-1 block w-full" v-model="form.tanggal" autocomplete="tanggal" />
              <jet-input-error :message="errors.tanggal" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="judul" value="Judul" />
              <jet-input id="judul" type="text" class="mt-1 block w-full" v-model="form.judul" autocomplete="judul" />
              <jet-input-error :message="errors.judul" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label value="Kategori" />
              <input type="radio" id="blog" name="kategori" value="blog" v-model="form.kategori" required>
              <label for="blog">Blog</label><br>
              <input type="radio" id="komite" name="kategori" value="komite" v-model="form.kategori">
              <label for="komite">Komite</label><br>
              <jet-input-error :message="errors.komite" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="meta" value="Deskripsi Meta" />
              <jet-input id="meta" type="text" class="mt-1 block w-full" v-model="form.meta" autocomplete="meta" />
              <jet-input-error :message="errors.meta" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <jet-label for="kata_kunci" value="Kata Kunci" />
              <jet-input id="kata_kunci" type="text" class="mt-1 block w-full" v-model="form.kata_kunci" autocomplete="kata_kunci" />
              <jet-input-error :message="errors.kata_kunci" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
              <div class="input-group">
                <jet-label for="featured" value="Foto/Gambar" />
                <div class="input-group-btn">
                  <div @click.prevent="openFileManager">
                    <button-attach>
                      Pilih/Unggah
                    </button-attach>
                  </div>
                </div>
                <jet-input id="featured" type="text" class="mt-1 block w-full bg-gray-100" v-model="form.featured" autocomplete="featured" readonly/>
                <jet-input-error :message="errors.featured" class="mt-2" />
              </div>
            </div>
            <img class="mt-3" :src="form.featured" />

            <div class="col-span-6 sm:col-span-5">
              <jet-label for="konten" value="Konten" />
              <wysiwyg  v-model="form.konten"/>
              <jet-input-error :message="errors.konten" class="mt-2" />
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
          tanggal: null,
          judul: null,
          slug: null,
          kategori: '',
          meta: null,
          kata_kunci: '',
          featured: '',
          konten: null,
          status: null,
        }, {
          bag: 'submitForm',
          resetOnSuccess: false,
        }),

      }
    },

    created() {
      if (this.data !== null) {
        this.form.id = this.data.id
        this.form.tanggal = this.data.tanggal
        this.form.judul = this.data.judul
        this.form.slug = this.data.slug
        this.form.kategori = this.data.kategori
        this.form.meta = this.data.meta            
        this.form.kata_kunci = this.data.kata_kunci
        this.form.featured = this.data.featured
        this.form.konten = this.data.konten
        this.form.status = this.data.status
      }
    },

    methods: {
      submitForm() {
        this.form.post('/admin/blog/store', {
          preserveScroll: true
        })
      },

      openFileManager () {
        window.open(`/laravel-filemanager`, 'width=900,height=600')
        var self = this
        window.SetUrl = function (items) {
          self.form.featured = items[0].url
        }
        return false
      },

    },
  }
</script>
