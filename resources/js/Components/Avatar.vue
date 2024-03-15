<script setup>
import { ref } from 'vue';
const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    size: {
        type: String,
        default: 'md',
    },
    hoverEnabled: {
        type: Boolean,
        default: false,
    },
});

const showAvatarDetail = ref(false);
const hoverCardDelay = ref(250);
const hoverCardLeaveDelay = ref(200);
const hoverCardTimout = ref(null);
const hoverCardLeaveTimeout = ref(null);
function hoverCardEnter() {
    clearTimeout(hoverCardLeaveTimeout.value);
    if (showAvatarDetail.value) return;
    clearTimeout(hoverCardTimout.value);
    hoverCardTimout.value = setTimeout(() => {
      showAvatarDetail.value = true;
    }, hoverCardDelay.value);
}

function hoverCardLeave() {
    clearTimeout(hoverCardTimout.value);
    if (!showAvatarDetail.value) return;
    clearTimeout(hoverCardLeaveTimeout.value);
    hoverCardLeaveTimeout.value = setTimeout(() => {
      showAvatarDetail.value = false;
    }, hoverCardLeaveDelay.value);
}

</script>

<template>
    <div class="relative" :class="{'size-7': size == 'sm', 'size-14': size == 'md', 'size-32': size == 'lg'}" @mouseover="hoverCardEnter()" @mouseleave="hoverCardLeave()">
        <div class="p-1.5 flex items-center justify-center rounded-full text-white h-full w-full cursor-pointer"
            :class="[user.color, {'text-xs': size == 'sm', 'text-lg': size == 'md', 'text-3xl': size == 'lg', }]">
            {{ user.name_for_avatar }}
        </div>
        <div v-if="hoverEnabled" v-show="showAvatarDetail" class="absolute top-0 w-[210px] max-w-lg mt-5 z-30 -translate-x-1/2 translate-y-3 left-1/2 ">
            <div v-show="showAvatarDetail" class="w-[full] h-auto bg-white  p-5 flex flex-col rounded-md shadow-sm border border-secondary-300/70">
                <div class="mx-auto">
                    <Avatar size='md' :user="user"></Avatar>
                </div>
                <div class="mt-2 font-medium text-center text-secondary-700">
                {{ user.name }}
                </div>
                <div class="text-sm font-light text-center text-secondary-700">
                &#64;{{ user.username }}
                </div>
            </div>
        </div>
    </div>
</template>
