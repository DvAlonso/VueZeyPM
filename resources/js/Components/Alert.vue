<script setup>
import { IconCheck, IconAlertCircle, IconInfoCircle } from '@tabler/icons-vue';
const props = defineProps({
    type: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div :class="{ 'bg-red-50 text-red-600': type == 'danger', 'bg-green-50 text-green-600': type == 'success' }"
        class="relative w-full rounded-lg border border-transparent p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11">
        <IconCheck class="size-4" v-if="type == 'success'"></IconCheck>
        <IconAlertCircle class="size-4" v-if="type == 'danger'"></IconAlertCircle>
        <h5 class="mb-1 font-medium leading-none tracking-tight">
            <slot name="title"></slot>
        </h5>
        <div class="text-sm opacity-80">
            <slot name="description"></slot>
        </div>
    </div>
</template>