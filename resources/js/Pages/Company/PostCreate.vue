<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    title: '',
    slug: '',
});
</script>

<template>

    <Head title="New Post" />
    <AuthenticatedLayout>
        <template #title>
            New post
        </template>
        <form @submit.prevent="submit" class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <div>
                <InputLabel required for="title" value="Title" />
                <TextInput id="title" type="text" class="block w-full mt-1" v-model="form.title" required autofocus />
                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div>
                <InputLabel required for="slug" value="Slug" />
                <TextInput id="slug" type="text" class="block w-full mt-1" v-model="form.slug" required autofocus />
                <InputError class="mt-2" :message="form.errors.slug" />
            </div>
            <div class="col-span-3">
                <InputLabel required for="content" value="Content" />
            </div>
        </form>
    </AuthenticatedLayout>
</template>
