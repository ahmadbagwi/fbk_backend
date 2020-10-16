<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <h1 class="text-lg text-gray-600">Dashboard {{ $page.auth.user.kegiatan }}</h1>
            </div>

            <div class="mt-6 text-gray-500" v-if="$page.auth.user.kegiatan == 'FBK'">
                Pada halaman dashboard ini anda dapat melakukan pengisian kelengkapan data dan melihat status verifikasi setiap formulir.
                <br>
                File pendukung (film, video, foto dll) di unggah ke file manager.
            </div>
            <div class="mt-6 text-gray-500" v-else>
                Pada halaman dashboard ini anda dapat melakukan pengisian laporan kegiatan {{ $page.auth.user.kegiatan }}.<br>
                File pendukung (film, video, foto dll) di unggah ke file manager.
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6" v-if="$page.auth.user.kegiatan == 'FBK'">
                <div class="flex items-center">
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-bounding-box text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Menu Biodata</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Untuk mengisi data pengusul
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l" v-if="$page.auth.user.kegiatan == 'FBK'">
                <div class="flex items-center">
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Menu Pengajuan</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Untuk mengisi data pengajuan, dan melihat status verifikasi pengajuan
                    </div>

                </div>
            </div>

            <div class="p-6 border-t border-gray-200" v-if="$page.auth.user.kegiatan == 'FBK'">
                <div class="flex items-center">
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-layout-text-sidebar-reverse text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 1h12a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm12-1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
                    <path fill-rule="evenodd" d="M5 15V1H4v14h1zm8-11.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm0 3a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                  </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="#">Menu Administrasi</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Untuk mengunggah kelengkapan berkas yang dibutuhkan, dan melihat status verifikasi administrasi
                    </div>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-l" v-if="$page.auth.user.kegiatan == 'FBK'">
                <div class="flex items-center">
                  <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-list-check text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                  </svg>
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Menu Laporan</div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Untuk mengisi laporan, yang teridi dari laporan 80% dan laporan 20%
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from './../Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
