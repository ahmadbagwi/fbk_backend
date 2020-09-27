<template>
    <div>
        <transition leave-active-class="transition ease-in duration-10000" leave-class="opacity-100" leave-to-class="opacity-0">
            <div v-show="on" class="text-sm p-2 m-2 text-gray-600 bg-green-400">
                <slot />
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: ['on'],
    }
</script>
