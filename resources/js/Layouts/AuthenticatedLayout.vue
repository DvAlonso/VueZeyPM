<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import Breadcrumbs from "@/Components/Breadcrumbs.vue";
import NavLink from "@/Components/NavLink.vue";
import Sidebar from "@/Components/Sidebar.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";
import { IconX, IconMenu } from "@tabler/icons-vue";

const sidebarOpen = ref(false);
</script>

<template>
    <div class="min-h-screen">
        <div :class="{
            'relative hidden z-50 lg:flex lg:fixed lg:w-60': !sidebarOpen,
        }" class="relative z-50 h-full lg:flex lg:fixed lg:w-60">
            <div class="fixed inset-0 lg:relative">
                <div v-show="sidebarOpen" class="relative flex flex-1 w-full max-w-xs mr-16 lg:!flex">
                    <!-- Close button -->
                    <div v-show="sidebarOpen" class="absolute top-0 flex justify-center w-16 pt-5 left-full lg:hidden">
                        <button @click="sidebarOpen = false" type="button" class="-m-2.5 p-2.5">
                            <IconX class="text-red-500" />
                        </button>
                    </div>
                    <Sidebar></Sidebar>
                </div>
            </div>
        </div>
        <div class="lg:pl-60">
            <div @click="sidebarOpen = true">
                <!-- <IconMenu class="text-red-600 cursor-pointer"/> -->
            </div>
            <main class="py-6">
                <div class="px-4 sm:px-6">
                    <div>
                        <Breadcrumbs></Breadcrumbs>
                    </div>
                    <div class="flex justify-start pb-1 mb-4 border-b border-primary-700/40">
                        <h1 class="title text-secondary-700">
                            <slot name="title"> Undefined title </slot>
                        </h1>
                        <div id="topbar-actions" class="ml-auto">
                            <slot name="actions"></slot>
                        </div>
                    </div>
                    <slot></slot>
                </div>
            </main>
        </div>
    </div>
</template>
