<script setup>
import Avatar from '@/Components/Avatar.vue';
const props = defineProps({
    team: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="flex flex-col h-40 p-4 border shadow gap-x-2">
        <span class="mt-1 font-medium text-secondary-600">{{ team.name }}</span>
        <span class="mt-1 text-xs font-light text-secondary-600">{{ team.description }}</span>
        <div class="flex flex-col mt-auto">
            <span class="mb-1 font-semibold uppercase text-2xs text-primary-600">Members</span>
            <span v-if="team.user_count == 0" class="text-xs italic text-secondary-500">No users have been added yet.</span>
            <div class="flex items-center justify-start gap-x-1">
                <Avatar v-for="user in team.users" :user="user" :size="'sm'" :hoverEnabled="true"></Avatar>
                <div v-if="team.user_count > team.users.length" class="flex items-center justify-center p-1 text-xs border rounded-full select-none size-7 text-secondary-700 border-secondary-400">
                    +{{ team.user_count - team.users.length }}
                </div>
            </div>
        </div>
    </div>

</template>
