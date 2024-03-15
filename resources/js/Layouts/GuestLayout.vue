<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="mt-4 text-3xl font-semibold text-center text-cyan-700">
            ZEYPM
        </div>
        <div class="p-6 min-w-96">
            <slot />
        </div>
    </div>
</template>
