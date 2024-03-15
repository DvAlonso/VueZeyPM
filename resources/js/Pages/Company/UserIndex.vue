<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Users" />
    <AuthenticatedLayout>
        <template #title>
            Users
        </template>
    </AuthenticatedLayout>
</template>
