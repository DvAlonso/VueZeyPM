<script setup>
import Avatar from "@/Components/Avatar.vue";
const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="flex p-4 border rounded shadow gap-x-4">
        <Avatar :user="user"></Avatar>
        <span class="mt-1 font-medium text-secondary-600">{{ user.name }}</span>
    </div>
</template>
