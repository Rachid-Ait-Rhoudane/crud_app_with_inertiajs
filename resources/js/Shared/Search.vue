<script setup>

import { router } from '@inertiajs/vue3';
import { onMounted, ref, watch } from 'vue';

let props = defineProps({
    url: {
        type: String,
        required: true
    },
    filters: {
        type: Object,
        required: true
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

let filter = ref(typeof(props.filters['filter']) == 'string' ? props.filters['filter'] : 'filter');

const getResults = () => {

    router.get(props.url,
    {
        search: search.value,
        filter: filter.value
    },
    {
        preserveState: true,
        replace: true
    });
}

const withTrashed = () => {

    filter.value = "with trashed";
    getResults();
}

const onlyTrashed = () => {

    filter.value = "only trashed";
    getResults();
}

const reset = () => {

    filter.value = "filter";
    search.value = '';
    getResults();
}

let search = ref(props.filters['search']);

watch(search, value => {
    getResults();
});

</script>

<template>

    <div class="flex-1 flex items-center">

        <div class="relative">

            <button id="filter-btn" class="px-3 h-10 bg-white w-full rounded-l-md border border-gray-200 border-r-0 flex items-center gap-2 text-gray-500">
                <span class="capitalize hidden lg:block">{{ filter }}</span>
                <i class="fa-solid fa-chevron-down duration-300 text-xs md:text-sm"></i>
            </button>

            <div id="filter-list" class="hidden absolute left-0 top-[calc(100%+5px)] min-w-[140px] bg-gray-200 py-2 divide-y divide-gray-100 rounded-md">
                <button type="button" @click="withTrashed" class="block whitespace-nowrap capitalize p-3 hover:bg-gray-300 w-full">with trashed</button>
                <button type="button" @click="onlyTrashed" class="block whitespace-nowrap capitalize p-3 hover:bg-gray-300 w-full">only trashed</button>
            </div>

        </div>

        <div class="flex-1 flex items-center gap-1 md:gap-4">
            <input v-model="search" class="h-10 w-3/4 lg:w-1/4 rounded-r-md focus:outline-none border border-gray-200 pl-4 pr-2" type="text" placeholder="Search for ...">
            <button type="button" @click="reset" class="capitalize text-gray-500 hover:text-gray-700">reset</button>
        </div>

    </div>

</template>
