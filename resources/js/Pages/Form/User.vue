<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data User
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
              <jet-form-section @submitted="submitForm">
                <template #title>
                  Form Data User
                </template>

                <template #description>
                  <p>Ubah data akun user<br>
                    Harap berhati-hati menggunakan fitur ini, jika data terhapus maka akan mempengaruhi tabel lainnya yang berhubungan
                  </p>
                </template>

                <template #form>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="name" value="Nama" />
                      <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                      <jet-input id="id" type="hidden" class="mt-1 block w-full" v-model="form.id" autocomplete="id" />
                      <jet-input-error :message="errors.name" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="email" value="Email" />
                      <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" autocomplete="email" />
                      <jet-input-error :message="errors.email" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="password" value="Password" />
                      <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" autocomplete="password" />
                      <jet-input-error :message="errors.password" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="password_confirmation" value="Konfirmasi Password" />
                      <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" autocomplete="password_confirmation" />
                      <jet-input-error :message="errors.password_confirmation" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="role" value="Role" />
                      <select v-model="form.role" id="role" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="user">user</option>
                        <option value="konten">penulis konten</option>
                        <option value="superadmin">superadmin</option>
                      </select>
                      <jet-input-error :message="errors.role" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <jet-label for="kegiatan" value="Kegiatan" />
                      <select id="kegiatan" type="text" class="mt-1 block w-full block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="form.kegiatan">
                        <option value="FBK">FASILITASI BIDANG KEBUDAYAAN (FBK)</option>
                        <option value="FKBM">FASILITASI KOMUNITAS BUDAYA DI MASYARAKAT (FKBM)</option>
                        <option value="FKK">FASILITASI KEGIATAN KESENIAN (FKK)</option>
                        <option value="FSK">FASILITASI SARANA KESENIAN (FSK)</option>
                      </select>
                      <jet-input-error :message="errors.kegiatan" class="mt-2" />
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
    import JetFormSection from './../../Jetstream/FormSection'
    import JetInput from './../../Jetstream/Input'
    import JetInputError from './../../Jetstream/InputError'
    import JetLabel from './../../Jetstream/Label'
    import JetActionMessage from './../../Jetstream/ActionMessage'
    import JetSecondaryButton from './../../Jetstream/SecondaryButton'
    import JetSectionBorder from './../../Jetstream/SectionBorder'

    export default {
        props: {
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
                    name: this.$page.auth.user.name,
                    id: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    role: null,
                    kegiatan: null,
                }, {
                    bag: 'submitForm',
                    resetOnSuccess: false,
                }),

            }
        },

        created() {
          if (this.data !== null) {
            this.form.name = this.data.name
            this.form.id = this.data.id
            this.form.email = this.data.email
            this.form.password = this.data.password
            this.form.password_confirmation = this.data.password_confirmation
            this.form.role = this.data.role
            this.form.kegiatan = this.data.kegiatan
          }
        },

        methods: {

          submitForm() {
            this.form.post('/admin/user/update', {
              preserveScroll: true
            })
          }
        },
    }
</script>
