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

            <!-- <v-client-table :data="data" :columns="columns" :options="options">

              <div class="input-group-btn" slot="ktp" slot-scope="props">
                <a :href="props.row.ktp">
                  <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                    </svg>&nbsp;File
                  </button>
                </a>
              </div>

              <div class="input-group-btn" slot="kemenkumham" slot-scope="props">
                <a :href="props.row.kemenkumham">
                  <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                    </svg>&nbsp;File
                  </button>
                </a>
              </div>

              <div class="input-group-btn" slot="akta" slot-scope="props">
                <a :href="props.row.akta">
                  <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                    </svg>&nbsp;File
                  </button>
                </a>
              </div>


              <div class="input-group-btn" slot="npwp" slot-scope="props">
                <a :href="props.row.npwp">
                  <button class="flex text-black-600 border border-blue-600 hover:bg-gray-200 px-4 py-2 rounded" >
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>
                    </svg>&nbsp;File
                  </button>
                </a>
              </div>
            </v-client-table> -->
            <vue-good-table
              :columns="columns"
              :rows="data"
              :fixed-header="true"
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
                <span v-if="props.column.field == 'hapus'">
                  <div class="input-group-btn" @click.prevent="deleteData(props.row.id)">
                      <button class="flex text-red-400 border-red-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg><p class="text-sm">Hapus</p>
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
                //columns: ['id', 'kategori', 'nama_pengusul', 'nama_penananggungjawab', 'ktp', 'kemenkumham', 'akta', 'npwp', 'alamat', 'provinsi', 'kota', 'telp', 'email'],
                columns: [
                  {
                    label: 'Id',
                    field: 'id',
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
                    field: 'nama_penananggungjawab',
                  },
                  {
                    label: 'KTP',
                    field: 'ktp',
                  },
                  {
                    label: 'Hapus',
                    field: 'hapus',
                    sortable: false
                  }
                ],
                options: {
                  perPage: 100,
                  headings: {},
                  sortable: [],
                  
                }

            }
        },

        methods: {
          deleteData(id){
            console.log(id)
          }
        },
    }
</script>
