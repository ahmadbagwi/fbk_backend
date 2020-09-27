<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                FileManager
            </h2>
            
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <iframe src="/laravel-filemanager" style="width: 100%; height: 750px; overflow: hidden; border: none;"></iframe>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../Layouts/AppLayout'
    // import Welcome from './../Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            // Welcome,
        },
    }
</script>
