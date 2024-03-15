<script setup>
import LauncherLayout from '@/Layouts/LauncherLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { IconPlus } from '@tabler/icons-vue';
import CompanyLogo from '@/Components/CompanyLogo.vue';

defineProps({ companies: Object })
</script>

<template>
    <Head title="Launcher" />

    <LauncherLayout>
        <h1 class="mb-8 text-center title-sm text-secondary-700">Select a company to get started</h1>
        <div class="flex items-center justify-center gap-x-6">
            <div v-for="company in companies">
                <CompanyLogo :company="company"></CompanyLogo>
            </div>
            <Link :href="route('app.companies.create')" class="flex items-center justify-center border-2 rounded-full cursor-pointer hover:bg-secondary-200 border-primary-700/40 size-24">
                <IconPlus class="text-primary-700 size-6" />
            </Link>
        </div>
    </LauncherLayout>
</template>
