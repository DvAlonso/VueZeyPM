<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import UserCard from "@/Components/UserCard.vue";
import TextInput from "@/Components/TextInput.vue";
import Alert from "@/Components/Alert.vue";
import { IconSearch } from "@tabler/icons-vue";

const search = ref('');
const props = defineProps({ users: Object });

function filtered() {
    return props.users.filter((user) =>
        user.name.toLowerCase().includes(search.value.toLowerCase())
    )
}
</script>

<template>

    <Head title="Users" />
    <AuthenticatedLayout>
        <template #title> Users </template>
        <div class="flex justify-end mb-4">
            <TextInput :placeholder="'Search'" v-model="search"></TextInput>
        </div>
        <Alert type="danger" v-if="search && !filtered().length">
            <template #title>No results</template>
            <template #description>Try searching for another word</template>
        </Alert>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <UserCard v-for="user in filtered()" :key="user" :user="user"></UserCard>

        </div>
    </AuthenticatedLayout>
</template>
