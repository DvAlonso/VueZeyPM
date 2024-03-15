<script setup>
import { computed } from 'vue';
import { usePage, Link} from '@inertiajs/vue3';
import { IconChevronRight, IconLayoutDashboard } from '@tabler/icons-vue';

const page = usePage();

const breadcrumbs = computed(() => {
    return page.props.breadcrumbs;
});
</script>

<template>
    <nav class="flex justify-between px-3.5 py-1 mb-4 border border-secondary-200/80 rounded-md w-fit">
         <ol class="inline-flex items-center space-x-1 text-xs text-secondary-500 [&_.active-breadcrumb]:text-primary-700/80 [&_.active-breadcrumb]:font-medium sm:mb-0">
            <template v-for="(breadcrumb, index) in breadcrumbs" :key="index" >
                <li class="flex items-center h-full hover:text-neutral-900">
                    <IconLayoutDashboard class="size-3.5 mr-1" v-if="index == 0"></IconLayoutDashboard>
                    <Link class="" v-if="index != Object.keys(breadcrumbs).length - 1" :href="breadcrumb.route">{{ breadcrumb.label }}</Link>
                    <span v-else class="select-none text-primary-700">{{ breadcrumb.label }}</span>
                </li>
                <IconChevronRight class="size-3.5 text-secondary-500" v-if="index != Object.keys(breadcrumbs).length - 1"></IconChevronRight>
            </template>
         </ol>
    </nav>
</template>
