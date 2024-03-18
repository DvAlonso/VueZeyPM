<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>

<template>

    <Head title="Message board" />
    <AuthenticatedLayout>
        <template #title>
            Message boardg
        </template>
        <template #actions>
            <PrimaryButton>
                <Link :href="route('app.message-board.create', route().params.company)">
                New post
                </Link>
            </PrimaryButton>
        </template>
    </AuthenticatedLayout>
</template>
