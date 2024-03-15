<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>


        <form @submit.prevent="submit" class="flex flex-col gap-y-6">
            <!-- Form itself -->
            <div>
                <InputLabel required for="email" value="Email" />
                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>
            <div>
                <InputLabel required for="password" value="Password" />
                 <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
             <div class="block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="text-xs font-semibold ml-2 text-secondary-700">Remember me</span>
                </label>
            </div>
            <!-- Submit -->
            <div class="mt-4">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Sign in
                </PrimaryButton>
            </div>
            <!-- Separator -->
            <div class="flex items-center gap-x-3">
                <div class="flex-grow">
                    <hr class="border border-secondary-300">
                </div>
                <span class="text-xs text-gray-700">or</span>
                <div class="flex-grow ">
                    <hr class="border border-secondary-300">
                </div>
            </div>
            <!-- Social login -->
            <hr class="border border-gray-300">
            <!-- Register -->
            <div class="">
                <p class="text-sm text-center text-gray-700">
                    Don't have an account?
                    <Link
                        :href="route('register')"
                        class="text-primary-700 hover:text-primary-900"
                    >
                    Sign up
                </Link>
                </p>
            </div>
        </form>
    </GuestLayout>
</template>
