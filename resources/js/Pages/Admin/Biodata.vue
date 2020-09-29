<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Pengusul
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-admin-section>

          <template #laman-admin>
            <download-excel
              class   = ""
              :data   = "data"
              worksheet = "biodata"
              name    = "biodata.xls">
              <button class="flex text-green-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                </svg>&nbsp;Export Data
              </button> 
            </download-excel>
            <vue-good-table
              :columns="columns"
              :rows="data"
              :fixed-header="true"
              styleClass="vgt-table text-sm"
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
                pageLabel: 'page', // for 'pages' mode
                allLabel: 'All',
              }" >

              <template slot="table-row" slot-scope="props">
                <span v-if="props.column.field == 'ktp'">
                  <div class="input-group-btn">
                    <button class="flex text-green-400 border-green-400 px-1 py-1 rounded" >
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                      </svg>&nbsp;<a :href="props.row.ktp" target="_blank">File</a>
                    </button>
                  </div>
                </span>
                <span v-else-if="props.column.field == 'kemenkumham'">
                  <div class="input-group-btn">
                      <button class="flex text-green-400 border-green-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                        </svg>&nbsp;<a :href="props.row.kemenkumham" target="_blank">File</a>
                      </button>
                  </div>
                </span>
                <span v-else-if="props.column.field == 'akta'">
                  <div class="input-group-btn">
                      <button class="flex text-green-400 border-green-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                        </svg>&nbsp;<a :href="props.row.akta" target="_blank">File</a>
                      </button>
                  </div>
                </span>

                <span v-else-if="props.column.field == 'npwp'">
                  <div class="input-group-btn">
                      <button class="flex text-green-400 border-green-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                        </svg>&nbsp;<a :href="props.row.npwp" target="_blank">File</a>
                      </button>
                  </div>
                </span>

                <span v-else-if="props.column.field == 'hapus'">
                  <div class="input-group-btn" @click.prevent="deleteData(props.row.id)">
                      <button class="flex text-red-400 border-red-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg><p class="text-sm" target="_blank">Hapus</p>
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
          deleteId: null,
        }, {
          bag: 'deleteData',
          resetOnSuccess: false,
        }),
        columns: [
        {
          label: 'User Id',
          field: 'user_id',
        },
        {
          label: 'Kategori',
          field: 'kategori',
        },
        {
          label: 'Pengusul',
          field: 'nama_pengusul',
          // type: 'date',
          // dateInputFormat: 'yyyy-MM-dd',
          // dateOutputFormat: 'MMM do yy',
          },
          {
            label: 'Penanggung Jawab',
            field: 'nama_penanggungjawab',
          },
          {
            label: 'KTP',
            field: 'ktp',
          },
          {
            label: 'SK Kemenkumham',
            field: 'kemenkumham',
          },
          {
            label: 'Akta',
            field: 'akta',
          },
          {
            label: 'NPWP',
            field: 'npwp',
          },
          {
            label: 'Alamat',
            field: 'alamat',
          },
          {
            label: 'Provinsi',
            field: 'provinsi',
          },
          {
            label: 'Kota',
            field: 'kota',
          },
          {
            label: 'Telp',
            field: 'telp',
          },
          {
            label: 'Email',
            field: 'email',
          },
          { label: 'Dibuat',
          field: 'created_at'
        },
        {
          label: 'Hapus',
          field: 'hapus',
          sortable: false
        }
        ],
        json_fields: {
          'User Id': 'user_id',
          'Kategori': 'kategori',
          'Pengusul': 'nama_pengusul',
          'Penanggung Jawab' : 'nama_penanggungjawab',
          'KTP' : 'ktp',
          'SK Kemenkumham' : 'kemenkumham',
          'Akta' : 'akta',
          'NPWP': 'npwp',
          'Alamat': 'alamat',
          'Provinsi': 'provinsi',
          'Kota': 'kota',
          'Telp': 'telp',
          'Email': 'email',
          'Dibuat': 'created_at'
        },
      }
    },

    methods: {
      deleteData(id){
        this.form.deleteId = id
        console.log(this.form.deleteId)
        this.form.post('/admin/biodata/delete', {
          preserveScroll: true
        })
      }
    },
  }
</script>
<style scoped>
  .table-font {

  }
</style>