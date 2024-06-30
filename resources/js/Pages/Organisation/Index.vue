<script setup>

import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { onMounted, ref, watch } from 'vue';

let props = defineProps({
    organisations: {
        type: Object,
        required: true
    },
    filters: {
        type: Object
    },
    success: {
        type: String
    }
});

onMounted(() => {

    let menuList = document.getElementById("filter-list");
    let btnArrow = document.querySelector("#filter-btn i");

    document.addEventListener('click', (e) => {

        if(e.target.id == "filter-btn" || e.target.parentNode.id == "filter-btn") {

            menuList.classList.toggle('hidden');
            btnArrow.classList.toggle('-rotate-90');
            return;
        }

        if(! menuList.classList.contains('hidden')) {
            menuList.classList.add('hidden');
            btnArrow.classList.remove('-rotate-90');
            return;
        }
    });

});

let filter = ref('filter');

const withTrashed = () => {

    filter.value = "with trashed";
}

const onlyTrashed = () => {

    filter.value = "only trashed";
}

const reset = () => {

    filter.value = "filter";
    search.value = '';
}

let search = ref(props.filters['search']);

watch(search, value => {

    router.get('/organisations',
    {
        search: search.value
    },
    {
        preserveState: true,
        replace: true
    });

});

</script>

<template>

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Organisations</h1>

    <div class="my-8 flex items-center justify-between">

        <div class="flex-1 flex items-center">

            <div class="relative">

                <button id="filter-btn" class="px-3 h-10 bg-white w-full rounded-l-md border border-gray-200 border-r-0 flex items-center gap-2 text-gray-500">
                    <span class="capitalize hidden lg:block">{{ filter }}</span>
                    <i class="fa-solid fa-chevron-down duration-300 text-xs md:text-sm"></i>
                </button>

                <div id="filter-list" class="hidden absolute left-0 top-[calc(100%+5px)] min-w-[140px] bg-white py-2 divide-y divide-gray-200 rounded-md">
                    <button type="button" @click="withTrashed" class="block whitespace-nowrap capitalize p-3 hover:bg-gray-200 w-full">with trashed</button>
                    <button type="button" @click="onlyTrashed" class="block whitespace-nowrap capitalize p-3 hover:bg-gray-200 w-full">only trashed</button>
                </div>

            </div>

            <div class="flex-1 flex items-center gap-1 md:gap-4">
                <input v-model="search" class="h-10 w-3/4 lg:w-1/4 rounded-r-md focus:outline-none border border-gray-200 pl-4 pr-2" type="text" placeholder="Search for ...">
                <button type="button" @click="reset" class="capitalize text-gray-500 hover:text-gray-700">reset</button>
            </div>

        </div>

        <Link class="px-3 py-2 rounded-md bg-secondary text-white hover:bg-orange-500 flex items-center gap-2" href="/organisation/create">
            <span class="capitalize hidden lg:block">create</span>
            <i class="fa-solid fa-plus text-xs md:text-sm"></i>
        </Link>

    </div>

    <div class="overflow-x-auto mt-6">

        <table class="min-w-[800px] w-full bg-white shadow-md">

            <thead class="border-b border-b-gray-200 text-base md:text-2xl capitalize text-white bg-main">
                <tr>
                    <th class="text-left px-4 py-3">name</th>
                    <th class="text-left px-4">city</th>
                    <th class="text-left px-4">address</th>
                    <th class="text-left px-4">email</th>
                    <th class="text-left px-4">phone</th>
                    <th class="text-left px-4"></th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b border-b-gray-200 even:bg-gray-200 whitespace-nowrap text-sm md:text-base" v-for="organisation in organisations.data" :key="organisation.id">
                    <td class="text-left px-4 py-3">{{ organisation.name }}</td>
                    <td class="text-left px-4">{{ organisation.city }}</td>
                    <td class="text-left px-4">{{ organisation.address }}</td>
                    <td class="text-left px-4">{{ organisation.email }}</td>
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
