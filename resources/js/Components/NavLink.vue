<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'border-white bg-primary-700 text-white border-transparent hover:bg-primary-600'
        : 'text-secondary-700 border-primary-700/90 hover:bg-primary-700/10'
);
</script>

<template>
    <Link :href="href" :class="classes" class="flex items-center justify-start p-2 rounded-md gap-x-3 text-xs">
        <div class="size-4">
            <slot name="icon"></slot>
        </div>
        <slot name="label"></slot>
    </Link>
</template>
