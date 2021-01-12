<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data FAQ
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-admin-section>
          <template #laman-admin>
            <div class="md:flex w-full md:inline-block block mx-1 md:mx-1 p-2 rounded bg-green-800 text-white font-semibold">
              <div class="w-5/5 md:w-full mb-1 sm:mb-0 flex justify-between">
                <div class="mx-4 w-auto max-w-full berita-create inline flex p-1">
                  <span class="mr-4">Daftar FAQ</span>
                  <inertia-link href="/admin/faq/create/0">
                    <button class="flex w-24 max-w-24 text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded shadow" >
                     &#10010; &nbsp;Baru
                    </button>
                  </inertia-link>
                </div>
                <div>
                </div>
              </div>
            </div>
            <vue-good-table
              :columns="columns"
              :rows="data"
              :line-numbers="true"
              styleClass="vgt-table condensed"
              :search-options="{
                enabled: true
              }"
              :sort-options="{
                enabled: true,
              }"
              :pagination-options="{
                enabled: true,
                mode: 'records',
                perPage: 20,
                position: 'bottom',
                perPageDropdown: [3, 7, 9],
                dropdownAllowAll: false,
                nextLabel: 'next',
                prevLabel: 'prev',
                rowsPerPageLabel: 'Rows per page',
                ofLabel: 'of',
                pageLabel: 'page',
                allLabel: 'All',
              }" >
              <template slot="table-row" slot-scope="props">
                <span v-if="props.column.field == 'edit'">
                  <div class="input-group-btn">
                      <button class="flex text-green-400 border-green-400  px-1 py-1 rounded" >
                        &#9997;
                        <inertia-link :href="`/admin/faq/create/${props.row.id}`">
                          Edit
                        </inertia-link>
                      </button>
                  </div>
                </span>
                <span v-else-if="props.column.field == 'hapus'">
                  <div class="input-group-btn" @click.prevent="destroy(id = props.row.id)">
                      <button class="flex text-red-400 border-red-400  px-1 py-1 rounded" >
                        &#10060; &nbsp;<p class="text-sm" target="_blank">Hapus</p>
                      </button>
                  </div>
                </span>
                <span v-else>
                  {{props.formattedRow[props.column.field]}}
                </span>
              </template>
            </vue-good-table>
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
  import LamanAdminSection from './../../Jetstream/LamanAdminSection'
  import JetInput from './../../Jetstream/Input'
  import JetInputError from './../../Jetstream/InputError'
  import JetLabel from './../../Jetstream/Label'
  import JetActionMessage from './../../Jetstream/ActionMessage'
  import JetSecondaryButton from './../../Jetstream/SecondaryButton'
  import JetSectionBorder from './../../Jetstream/SectionBorder'
import Input from '../../Jetstream/Input.vue'

  export default {
    props: {
      data: {},
    },
    components: {
      AppLayout,
      JetActionMessage,
      JetButton,
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
          file: '',
          deleteId: null,
        }, {
          bag: 'deleteData',
          resetOnSuccess: false,
        }),
        columns: [
          {
            label: 'Pertanyaan',
            field: 'judul',
          },
          {
            label: 'Jawaban',
            field: 'konten',
          },
          {
            label: 'Edit',
            field: 'edit',
          },
          {
            label: 'Hapus',
            field: 'hapus',
          },
        ],
      }
    },

    methods: {
      destroy(id){
        const hapus = confirm('Hapus data?')
        if(hapus) {
          axios.post('/admin/blog/destroy', {
            id : this.id
          })
            .then((response) => {
              // alert('Data telah dihapus'),
              location.reload()
              })
              .catch((error) => console.log(error))
        }
      },
    },
  }
</script>
