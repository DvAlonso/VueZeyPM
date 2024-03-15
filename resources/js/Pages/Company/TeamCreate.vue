<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
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
    form.post(route('app.teams.store', route().params.company));
}
</script>

<template>
    <Head title="Create team" />
    <AuthenticatedLayout>
        <template #title>
            Create team
        </template>
        <p class="mb-6 text-xs font-light">
            Setup a new team to start collaborating.
        </p>
        <form @submit.prevent="submit" class="flex flex-col gap-y-6">
             <!-- Form itself -->
            <div class="lg:w-1/4">
                <InputLabel required for="name" value="Team name" />
                <TextInput
                    id="name"
                    type="text"
                    class="block w-full mt-1"
                    v-model="form.name"
                    required
                    autofocus
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div class="lg:w-1/2">
                <InputLabel required for="description" value="Team description" />
                <TextareaInput
                    id="description"
                    class="block w-full mt-1"
                    v-model="form.description"
                />
            </div>
             <!-- Submit -->
            <div class="mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Create team
                </PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
