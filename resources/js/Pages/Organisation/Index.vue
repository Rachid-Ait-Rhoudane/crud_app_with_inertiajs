<script setup>

import { Link } from '@inertiajs/vue3';

defineProps({
    organisations: {
        type: Object,
        required: true
    }
});


</script>

<template>

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Organisations</h1>

    <div class="overflow-x-auto mt-6">

        <table class="min-w-[800px] w-full bg-white shadow-md border-collapse">

            <thead class="border-b border-b-gray-200 text-base md:text-2xl capitalize text-white bg-main">
                <tr>
                    <th class="text-left px-4 py-3">name</th>
                    <th class="text-left px-4">city</th>
                    <th class="text-left px-4">phone</th>
                    <th class="text-left px-4"></th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b border-b-gray-200 even:bg-gray-200 whitespace-nowrap text-sm md:text-base" v-for="organisation in organisations.data" :key="organisation.id">
                    <td class="text-left px-4 py-3">{{ organisation.name }}</td>
                    <td class="text-left px-4">{{ organisation.city }}</td>
                    <td class="text-left px-4">{{ organisation.phone }}</td>
                    <td class="text-left px-4 w-fit">
                        <Link class="flex items-center gap-1 text-blue-500 hover:text-blue-600" href="#">
                            <i class="fa-solid fa-eye"></i>
                            <span>View</span>
                        </Link>
                    </td>
                </tr>
            </tbody>

        </table>

    </div>

    <div class="my-6 flex items-center gap-2">

        <Component
            :is="link.url ? Link : 'span'"
            class="px-2 md:px-3 py-1 md:py-2 border border-gray-300 rounded-md text-xs"
            v-for="link in organisations.links"
            :key="link.id"
            v-html="link.label"
            :class="{'bg-secondary text-white font-bold': link.active, 'text-gray-400 border-gray-200 cursor-not-allowed': !link.url, 'hover:bg-gray-200': link.url && !link.active}"
            :href="link.url"
            preserve-scroll
        />

    </div>

</template>
