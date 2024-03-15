<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    company: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Link :href="route('app.companies.dashboard', company)" :class="'relative flex items-center justify-center rounded-full cursor-pointer hover:bg-opacity-80 size-24 ' + company.color">
        <span class="text-2xl text-white">{{ company.name_for_logo }}</span>
        <p class="absolute w-full mt-3 text-xs font-light text-center top-full">{{ company.name }}</p>
    </Link>
</template>
