<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Roles" />
    <AuthenticatedLayout>
        <template #title>
            Roles
        </template>
    </AuthenticatedLayout>
</template>
