<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Message board" />
    <AuthenticatedLayout>
        <template #title>
            Message board
        </template>
    </AuthenticatedLayout>
</template>
