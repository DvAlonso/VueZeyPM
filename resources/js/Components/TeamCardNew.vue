<script setup>
import { Link } from '@inertiajs/vue3';
import { IconPlus } from '@tabler/icons-vue';
</script>
<template>
    <Link class="flex items-center justify-center w-full h-40 border shadow gap-x-2 hover:bg-primary-700/10 hover:border-primary-700/20" :href="route('app.teams.create', route().params.company)">
        <IconPlus class="text-secondary-500 size-5"></IconPlus>
        <span class="font-light text-secondary-700">New team</span>
    </Link>
</template>
