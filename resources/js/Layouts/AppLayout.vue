<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/dashboard">
                                <jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/dashboard" :active="$page.currentRouteName == 'dashboard'">
                                Dashboard
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/biodata/show" :active="$page.currentRouteName == 'biodata_show'">
                                Biodata
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/pengajuan/show" :active="$page.currentRouteName == 'pengajuan_show'">
                                Pengajuan
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/administrasi/show" :active="$page.currentRouteName == 'administrasi_show'">
                                Administrasi
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/Laporan/show" :active="$page.currentRouteName == 'laporan_show'">
                                Laporan
                            </jet-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <jet-nav-link href="/filemanager" :active="$page.currentRouteName == 'filemanager'">
                                File Manager
                            </jet-nav-link>
                        </div>
                        
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
                                            <form @submit.prevent="switchToTeam(team)">
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
                    <jet-responsive-nav-link href="/dashboard" :active="$page.currentRouteName == 'dashboard'">
                        Dashboard
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/biodata/show" :active="$page.currentRouteName == 'biodata_show'">
                        Biodata
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/pengajuan/show" :active="$page.currentRouteName == 'pengajuan_show'">
                        Pengajuan
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/administrasi/show" :active="$page.currentRouteName == 'administrasi_show'">
                        Administrasi
                    </jet-responsive-nav-link>
                    <jet-responsive-nav-link href="/laporan/show" :active="$page.currentRouteName == 'laporan_show'">
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
                                <form @submit.prevent="switchToTeam(team)">
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
        <!-- <fade-transition origin="center" mode="out-in" :duration="250"> -->
          <!-- Page Heading -->
          <header class="bg-white shadow">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                  <slot name="header"></slot>
                  <br>
                  <!-- <div style="display: inline;">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                  </svg><h1></h1>
                  </div> -->

                  <div class="col-span-6 flex items-center bg-gray-500 text-white text-sm font-bold px-4 py-3" role="alert">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                  </svg>
                  <p>&nbsp;{{ $page.auth.user.name }}</p>
                  </div>
                  <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded relative" role="alert" v-if="$page.flash.message">
                    <strong class="font-bold">Info!</strong>
                    <span class="block sm:inline">{{ $page.flash.message }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
              </div>
          </header>

          <!-- Page Content -->
          
          <main>
              <slot></slot>
          </main>
        <!-- </fade-transition> -->
        <!-- Modal Portal -->
        <portal-target name="modal" multiple>
        </portal-target>
    </div>
</template>

<script>
    import {FadeTransition} from 'vue2-transitions'
    import JetApplicationLogo from './../Jetstream/ApplicationLogo'
    import JetApplicationMark from './../Jetstream/ApplicationMark'
    import JetDropdown from './../Jetstream/Dropdown'
    import JetDropdownLink from './../Jetstream/DropdownLink'
    import JetNavLink from './../Jetstream/NavLink'
    import JetResponsiveNavLink from './../Jetstream/ResponsiveNavLink'

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
  
</style>