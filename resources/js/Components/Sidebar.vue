<script setup>
import NavLink from '@/Components/NavLink.vue';
import { IconLayoutDashboard, IconMessages, IconUser, IconUsersGroup, IconLock, IconSettings } from '@tabler/icons-vue';
</script>

<template>
    <div class="flex flex-col min-h-screen bg-white border-r-2 lg:fixed left-full lg:left-0 w-72 lg:w-60">
        <div class="mt-4 text-lg font-semibold text-center text-cyan-700">
            ZEYPM
        </div>
        <div class="flex flex-col px-4 py-2">
            company selector
        </div>
        <div class="flex flex-col px-4 py-4 gap-y-1">
            <NavLink :href="route('app.companies.dashboard', route().params.company)" :active="route().current('app.companies.dashboard')">
                <template v-slot:icon>
                    <IconLayoutDashboard/>
                </template>
                <template v-slot:label>
                    Dashboard
                </template>
            </NavLink>
            <NavLink :href="route('app.teams.index', route().params.company)" :active="route().current('app.teams.index')">
                <template v-slot:icon>
                    <IconMessages/>
                </template>
                <template v-slot:label>
                    Message board
                </template>
            </NavLink>
            <NavLink :href="route('app.users.index', route().params.company)" :active="route().current('app.users.index')">
                <template v-slot:icon>
                    <IconUser/>
                </template>
                <template v-slot:label>
                    Users
                </template>
            </NavLink>
            <NavLink :href="route('app.teams.index', route().params.company)" :active="route().current('app.teams.*')">
                <template v-slot:icon>
                    <IconUsersGroup/>
                </template>
                <template v-slot:label>
                    Teams
                </template>
            </NavLink>
            <NavLink :href="route('app.roles.index', route().params.company)" :active="route().current('app.roles.index')">
                <template v-slot:icon>
                    <IconLock/>
                </template>
                <template v-slot:label>
                    Roles
                </template>
            </NavLink>
            <NavLink :href="route('app.teams.index', route().params.company)" :active="route().current('app.teams.index')">
                <template v-slot:icon>
                    <IconSettings/>
                </template>
                <template v-slot:label>
                    Settings
                </template>
            </NavLink>
        </div>
        <div class="hidden p-4 mt-auto lg:flex">
            avatar
        </div>
    </div>
</template>
