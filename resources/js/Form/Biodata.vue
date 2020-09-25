<template>
    <jet-form-section @submitted="testForm">
        <template #title>
            Test Form
        </template>

        <template #description>
            Pastikan anda menggunakan kombinasi huruf angka, minimal 6 karakter.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="input1" value="Input 1" />
                <jet-input id="input1" type="text" class="mt-1 block w-full" v-model="form.input1" ref="input1"  />
                <jet-input-error :message="form.error('input1')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="input2" value="Input 2" />
                <jet-input id="input2" type="text" class="mt-1 block w-full" v-model="form.input2" />
                <jet-input-error :message="form.error('input2')" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="input3" value="Input 3" />
                <jet-input id="input3" type="text" class="mt-1 block w-full" v-model="form.input3" />
                <jet-input-error :message="form.error('input3')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Tersimpan.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Simpan
            </jet-button>
            <div v-if="lists">
              <tr v-for="(list, index) in lists" :key="list.id">
                  <td> {{ index + 1}} </td>
                  <td>{{ list.value }}</td>
              </tr>
            </div>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from './../Jetstream/ActionMessage'
    import JetButton from './../Jetstream/Button'
    import JetFormSection from './../Jetstream/FormSection'
    import JetInput from './../Jetstream/Input'
    import JetInputError from './../Jetstream/InputError'
    import JetLabel from './../Jetstream/Label'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },
        props: {
          satu: null,
          dua: null,
          lists: []
        },
        data() {
            return {
              // form: {
              //       input1: '',
              //       input2: '',
              //       input3: '',
              //   }, 
                form: this.$inertia.form({
                    input1: '',
                    input2: '',
                    input3: '',
                }, {
                    bag: 'testForm',
                }),
            }
        },

        methods: {
            testForm() {
                // this.$inertia.post('api/form/testform', this.form1)
                // .then(response => (
                //   console.log(response)
                // ))
                // .catch(error => console.log(error))
                this.form.post('/biodata/store', {
                    preserveScroll: true
                })
                // .then(response => (
                //     this.$refs.input1.focus()
                    //console.log(response)
                // ))
                
            },
        },
    }
</script>
