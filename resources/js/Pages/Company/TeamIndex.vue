<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TeamCard from '@/Components/TeamCard.vue';
import TeamCardNew from '@/Components/TeamCardNew.vue';

defineProps({ teams: Object })
</script>

<template>
    <Head title="Teams" />
    <AuthenticatedLayout>
        <template #title>
            Teams
        </template>
        <p class="mb-6 text-xs font-light"> Manage your teams and their members. </p>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <TeamCardNew></TeamCardNew>
            <TeamCard v-for="team in teams" :team="team"></TeamCard>
        </div>
    </AuthenticatedLayout>
</template>
