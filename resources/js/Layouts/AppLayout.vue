<template>
  <fade-transition origin="center" mode="out-in" :duration="250">
    <div class="min-h-screen bg-app-layout">
        <nav class="bg-gray-800 border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <inertia-link :href="`/dashboard`">
                                <jet-application-mark class="block h-16 w-auto" />
                            </inertia-link>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.kegiatan == 'FBK'">
                            <jet-nav-link href="/dashboard" :active="$page.currentRouteName == 'dashboard'" v-if="$page.auth.user.role == 'user'">
                                Dashboard
                            </jet-nav-link>
                            <jet-nav-link href="/admin/dashboard" :active="$page.currentRouteName == 'admin_dashboard'" v-else>
                                Dashboard
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.kegiatan == 'FBK'">
                            <jet-nav-link href="/biodata/show" :active="$page.currentRouteName == 'biodata_show'" v-if="$page.auth.user.role == 'user'">
                                Biodata
                            </jet-nav-link>
                            <jet-nav-link href="/admin/biodata" :active="$page.currentRouteName == 'admin_biodata'" v-else>
                                Biodata
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.kegiatan == 'FBK'">
                            <jet-nav-link href="/pengajuan/show" :active="$page.currentRouteName == 'pengajuan_show'" v-if="$page.auth.user.role == 'user'">
                                Pengajuan
                            </jet-nav-link>
                            <jet-nav-link href="/admin/pengajuan" :active="$page.currentRouteName == 'admin_pengajuan'" v-else>
                                Pengajuan
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.kegiatan == 'FBK'">
                            <jet-nav-link href="/administrasi/show" :active="$page.currentRouteName == 'administrasi_show'" v-if="$page.auth.user.role == 'user'">
                                Administrasi
                            </jet-nav-link>
                            <jet-nav-link href="/admin/administrasi" :active="$page.currentRouteName == 'admin_administrasi'" v-else>
                                Administrasi
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                            <jet-nav-link href="/laporan/show" :active="$page.currentRouteName == 'laporan_show'" v-if="$page.auth.user.role == 'user'">
                                Laporan
                            </jet-nav-link>
                            <jet-nav-link href="/admin/laporan" :active="$page.currentRouteName == 'admin_laporan'" v-else>
                                Laporan
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex">
                            <jet-nav-link href="/filemanager" :active="$page.currentRouteName == 'filemanager'">
                                File Manager
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.role == 'superadmin'">
                            <jet-nav-link href="/admin/user" :active="$page.currentRouteName == 'admin_user'">
                                User
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-4 sm:flex" v-if="$page.auth.user.role == 'superadmin'">
                            <jet-nav-link href="/admin/profil" :active="$page.currentRouteName == 'admin_profil'">
                                Profil
                            </jet-nav-link>
                        </div>
                        
                    </div>
                    <div align="right" class="flex-1 my-auto text-white">
                      <b-icon icon="person-circle" aria-hidden="true"></b-icon>&nbsp;{{ $page.user.name }}
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
                            <jet-dropdown align="right" width="48">

                                <template #trigger>
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                        <img class="h-8 w-8 rounded-full object-cover" :src="$page.user.profile_photo_url" :alt="$page.user.name" />
                                    </button>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

                                    <jet-dropdown-link href="/user/profile">
                                        Profile
                                    </jet-dropdown-link>

                                    <jet-dropdown-link href="/user/api-tokens" v-if="$page.jetstream.hasApiFeatures">
                                        API Tokens
                                    </jet-dropdown-link>

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Management -->
                                    <template v-if="$page.jetstream.hasTeamFeatures">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Team
                                        </div>

                                        <!-- Team Settings -->
                                        <jet-dropdown-link :href="'/teams/' + $page.user.current_team.id">
                                            Team Settings
                                        </jet-dropdown-link>

                                        <jet-dropdown-link href="/teams/create" v-if="$page.jetstream.canCreateTeams">
                                            Create New Team
                                        </jet-dropdown-link>

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Switch Teams
                                        </div>

                                        <template v-for="team in $page.user.all_teams">
                                            <form @submit.prevent="switchToTeam(team)" :key="team">
                                                <jet-dropdown-link as="button">
                                                    <div class="flex items-center">
                                                        <svg v-if="team.id == $page.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                        <div>{{ team.name }}</div>
                                                    </div>
                                                </jet-dropdown-link>
                                            </form>
                                        </template>

                                        <div class="border-t border-gray-100"></div>
                                    </template>

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <jet-dropdown-link as="button">
                                            Logout
                                        </jet-dropdown-link>
                                    </form>
                                </template>
                            </jet-dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <jet-responsive-nav-link href="/dashboard" :active="$page.currentRouteName == 'dashboard'" v-if="$page.auth.user.role == 'user'">
                        Dashboard
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/admin/dashboard" :active="$page.currentRouteName == 'admin_dashboard'" v-else>
                        Dashboard
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/biodata/show" :active="$page.currentRouteName == 'biodata_show'" v-if="$page.auth.user.role == 'user'">
                        Biodata
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/admin/biodata" :active="$page.currentRouteName == 'admin_biodata'" v-else>
                        Biodata
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/pengajuan/show" :active="$page.currentRouteName == 'pengajuan_show'" v-if="$page.auth.user.role == 'user'">
                        Pengajuan
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/admin/pengajuan" :active="$page.currentRouteName == 'admin_pengajuan'" v-else>
                        Pengajuan
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/administrasi/show" :active="$page.currentRouteName == 'administrasi_show'" v-if="$page.auth.user.role == 'user'">
                        Administrasi
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/admin/administrasi" :active="$page.currentRouteName == 'admin_administrasi'" v-else>
                        Administrasi
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/laporan/show" :active="$page.currentRouteName == 'laporan_show'" v-if="$page.auth.user.role == 'user'">
                        Laporan
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/admin/laporan" :active="$page.currentRouteName == 'admin_laporan'" v-else>
                        Laporan
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/filemanager" :active="$page.currentRouteName == 'filemanager'">
                        File Manager
                    </jet-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" :src="$page.user.profile_photo_url" :alt="$page.user.name" />
                        </div>

                        <div class="ml-3">
                            <div class="font-medium text-base text-gray-800">{{ $page.user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.user.email }}</div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <jet-responsive-nav-link href="/user/profile" :active="$page.currentRouteName == 'profile.show'">
                            Profile
                        </jet-responsive-nav-link>

                        <jet-responsive-nav-link href="/user/api-tokens" :active="$page.currentRouteName == 'api-tokens.index'" v-if="$page.jetstream.hasApiFeatures">
                            API Tokens
                        </jet-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" @submit.prevent="logout">
                            <jet-responsive-nav-link as="button">
                                Logout
                            </jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        <template v-if="$page.jetstream.hasTeamFeatures">
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Manage Team
                            </div>

                            <!-- Team Settings -->
                            <jet-responsive-nav-link :href="'/teams/' + $page.user.current_team.id" :active="$page.currentRouteName == 'teams.show'">
                                Team Settings
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link href="/teams/create" :active="$page.currentRouteName == 'teams.create'">
                                Create New Team
                            </jet-responsive-nav-link>

                            <div class="border-t border-gray-200"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Switch Teams
                            </div>

                            <template v-for="team in $page.user.all_teams">
                                <form @submit.prevent="switchToTeam(team)" :key="team">
                                    <jet-responsive-nav-link as="button">
                                        <div class="flex items-center">
                                            <svg v-if="team.id == $page.user.current_team_id" class="mr-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <div>{{ team.name }}</div>
                                        </div>
                                    </jet-responsive-nav-link>
                                </form>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
        </nav>
          <!-- Page Heading -->
          <header class="bg-white shadow border-b-2 border-blue-500">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  <slot name="header"></slot>
                    <div class="inline-block bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative" role="alert" v-if="$page.flash.message">
                      <strong class="font-bold">Info!</strong>
                      <span class="block sm:inline">{{ $page.flash.message }}</span>
                      <b-icon icon="x-circle" aria-hidden="true" @click.prevent="$page.flash.message = null"></b-icon>
                    </div>
              </div>
          </header>

          <!-- Page Content -->
          
          <main>
              <slot></slot>
          </main>
        <!-- Modal Portal -->
        <portal-target name="modal" multiple>
        </portal-target>
    </div>
  </fade-transition>
</template>

<script>
  import JetApplicationLogo from './../Jetstream/ApplicationLogo'
  import JetApplicationMark from './../Jetstream/ApplicationMark'
  import JetDropdown from './../Jetstream/Dropdown'
  import JetDropdownLink from './../Jetstream/DropdownLink'
  import JetNavLink from './../Jetstream/NavLink'
  import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'
  import {FadeTransition} from 'vue2-transitions'

  export default {
    components: {
      JetApplicationLogo,
      JetApplicationMark,
      JetDropdown,
      JetDropdownLink,
      JetNavLink,
      JetResponsiveNavLink,
      FadeTransition
    },

    data() {
      return {

        showingNavigationDropdown: false,
      }
    },

    created() {
      console.log(this.$page.currentRouteName)
    },

    methods: {
      switchToTeam(team) {
        this.$inertia.put('/current-team', {
          'team_id': team.id
        }, {
          preserveState: false
        })
      },

      logout() {
        axios.post('/logout').then(response => {
          window.location = '/';
        })
      },
    },

    computed: {
      path() {
        return window.location.pathname
      }
    }
  }
</script>
<style scoped>
  .bg-app-layout{
    background-color: #DFDBE5;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%231c5b85' fill-opacity='0.08'%3E%3Cpath fill-rule='evenodd' d='M11 0l5 20H6l5-20zm42 31a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM0 72h40v4H0v-4zm0-8h31v4H0v-4zm20-16h20v4H20v-4zM0 56h40v4H0v-4zm63-25a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM53 41a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-30 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-28-8a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zM56 5a5 5 0 0 0-10 0h10zm10 0a5 5 0 0 1-10 0h10zm-3 46a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm10 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM21 0l5 20H16l5-20zm43 64v-4h-4v4h-4v4h4v4h4v-4h4v-4h-4zM36 13h4v4h-4v-4zm4 4h4v4h-4v-4zm-4 4h4v4h-4v-4zm8-8h4v4h-4v-4z'/%3E%3C/g%3E%3C/svg%3E");
  }

  .bg-biru {
    background-color: #1D7CBF!important;
  }

  .bg-oren {
    background-color: #F7A31C;
  }

  .text-oren {
    color: #F7A31C;
    font-weight: 700;
  }
</style>