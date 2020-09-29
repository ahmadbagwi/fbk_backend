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
            <tr>
              <td class="p-2">
                <download-excel
                class   = ""
                :data   = "data"
                worksheet = "pengajuan"
                name    = "pengajuan.xls">
                  <button class="flex text-green-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                    </svg>&nbsp;Export Data
                  </button> 
                </download-excel>
              </td>
              <td class="p-2">
                <inertia-link :href="'/admin/pengajuan'">
                  <button class="flex text-blue-700 border-green-400 bg-gray-100 hover:bg-gray-200 px-1 py-1 rounded">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                      <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                    </svg>&nbsp;Refresh Data
                  </button>
                </inertia-link>
              </td>
            </tr>
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
                <span v-if="props.column.field == 'detail'">
                  <div class="input-group-btn">
                    <button class="flex text-green-400 border-green-400 px-1 py-1 rounded" >
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up-right-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd" d="M5.172 10.828a.5.5 0 0 0 .707 0l4.096-4.096V9.5a.5.5 0 1 0 1 0V5.525a.5.5 0 0 0-.5-.5H6.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
                      </svg>&nbsp;<a :href="`/admin/pengajuan/show/${props.row.id}`" target="_blank">Detail</a>
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
      status: null,
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
          deleteId: null
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
          label: 'Nama',
          field: 'name',
        },
        {
          label: 'Jenis',
          field: 'jenis',
        },
        {
          label: 'Judul',
          field: 'judul',
        },
        {
          label: 'Status',
          field: 'status',
        },
        {
          label: 'Detail',
          field: 'detail',
        },
        {
          label: 'Dibuat',
          field: 'created_at',
        },
        {
          label: 'Hapus',
          field: 'hapus',
          sortable: false
        }
        ]
      }
    },
    json_fields: {
      'User Id': 'user_id',
      'Jenis': 'jenis',
      'Judul': 'judul',
      'Konsep' : 'konsep',
      'Tanggal Mulai' : 'mulai',
      'Tanggal Selesai' : 'selesai',
      'Pelaksanaan Tahap 1' : 'tahap1',
      'Pelaksanaan Tahap 2': 'tahap2',
      'Biaya': 'biaya',
      'RAB': 'rab',
      'Video': 'video',
      'Dibuat': 'created_at'
    },
    methods: {
      verifikasi(id){
        this.form.verifikasiId = id
      },

      deleteData(id){
        this.form.deleteId = id
        console.log(this.form.deleteId)
        this.form.post('/admin/pengajuan/delete', {
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