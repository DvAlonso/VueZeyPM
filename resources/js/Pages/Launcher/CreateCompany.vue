<script setup>
import LauncherLayout from '@/Layouts/LauncherLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import TextareaInput from '@/Components/TextareaInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    name: '',
    description: '',
});

const submit = () => {
    form.post(route('app.companies.store'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
<template>
    <Head title="Create company" />
    <LauncherLayout>
        <h1 class="mb-3 text-center title-sm text-secondary-700">Create a new company</h1>
        <p class="mb-6 text-xs font-light text-center text-secondary-700">Don't worry, you will be able to update these details later.</p>
        <form @submit.prevent="submit" class="flex flex-col gap-y-6 mb-6">
            <!-- Form itself -->
            <div>
                <InputLabel required for="name" value="Company name" />
                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="description" value="Company description" />
                <TextareaInput
                    id="description"
                    class="mt-1 block w-full"
                    v-model="form.description"
                />
            </div>
             <!-- Submit -->
            <div class="mt-4">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create
                </PrimaryButton>
            </div>
        </form>
        <hr class="border border-gray-300">
        <div class="mt-6">
                <p class="text-sm text-center text-gray-700">
                    Got invited to a company?
                    <Link
                        :href="route('app.launcher.join')"
                        class="text-primary-700 hover:text-primary-900"
                    >
                    Enter the code
                </Link>
                </p>
            </div>
    </LauncherLayout>

</template>
