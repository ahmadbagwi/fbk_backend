<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data User
      </h2>
    </template>

    <div>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <laman-admin-section>

          <template #laman-admin>
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

                <span v-if="props.column.field == 'edit'">
                  <div class="input-group-btn">
                      <button class="flex text-green-400 border-green-400  px-1 py-1 rounded" >
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg>&nbsp;<a :href="`/admin/user/show/${props.row.id}`" target="_blank">Edit</a>
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
          field: 'id',
        },
        {
          label: 'Nama',
          field: 'name',
        },
        {
          label: 'Email',
          field: 'email',
          // type: 'date',
          // dateInputFormat: 'yyyy-MM-dd',
          // dateOutputFormat: 'MMM do yy',
          },
          {
            label: 'Dibuat',
            field: 'created_at',
          },
          {
            label: 'Jenis',
            field: 'kegiatan',
          },
          {
            label: 'Role',
            field: 'role',
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
      deleteData(id){
        this.form.deleteId = id
        console.log(this.form.deleteId)
        this.form.post('/admin/user/delete', {
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