<script setup>

import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { onMounted, ref, watch } from 'vue';
import Paginator from '../../Shared/Paginator.vue';
import CustomTable from '../../Shared/CustomTable.vue';
import SuccessMessage from '../../Shared/SuccessMessage.vue';
import CustomTableBody from '../../Shared/CustomTableBody.vue';
import CustomTableBodyColumn from '../../Shared/CustomTableBodyColumn.vue';
import CustomTableHeadColumn from '../../Shared/CustomTableHeadColumn.vue';

let props = defineProps({
    organisations: {
        type: Object,
        required: true
    },
    filters: {
        type: Object
    },
    message: {
        default: null
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

let filter = ref(props.filters['filter'] ?? 'filter');

const withTrashed = () => {

    filter.value = "with trashed";
    router.get('/organisations',
    {
        search: search.value,
        filter: filter.value
    },
    {
        preserveState: true,
        replace: true
    });
}

const onlyTrashed = () => {

    filter.value = "only trashed";
    router.get('/organisations',
    {
        search: search.value,
        filter: filter.value
    },
    {
        preserveState: true,
        replace: true
    });
}

const reset = () => {

    filter.value = "filter";
    search.value = '';
}

let search = ref(props.filters['search']);

watch(search, value => {

    router.get('/organisations',
    {
        search: search.value,
        filter: filter.value
    },
    {
        preserveState: true,
        replace: true
    });

});

</script>

<template>

    <SuccessMessage :message="message" />

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Organisations</h1>

    <div class="my-8 flex items-center justify-between">

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

        <Link class="px-3 py-2 rounded-md bg-secondary text-white hover:bg-orange-500 flex items-center gap-2" href="/organisation/create">
            <span class="capitalize hidden lg:block">create</span>
            <i class="fa-solid fa-plus text-xs md:text-sm"></i>
        </Link>

    </div>

    <CustomTable>

        <template v-slot:head>
            <CustomTableHeadColumn class="py-3">name</CustomTableHeadColumn>
            <CustomTableHeadColumn>city</CustomTableHeadColumn>
            <CustomTableHeadColumn>address</CustomTableHeadColumn>
            <CustomTableHeadColumn>email</CustomTableHeadColumn>
            <CustomTableHeadColumn>phone</CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
        </template>

        <CustomTableBody v-for="organisation in organisations.data" :key="organisation.id">
            <CustomTableBodyColumn class="py-3">{{ organisation.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ organisation.city }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ organisation.address }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ organisation.email }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ organisation.phone }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <Link class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/organisations/' + organisation.id">
                    <i class="fa-solid fa-eye"></i>
                    <span>View</span>
                </Link>
            </CustomTableBodyColumn>
        </CustomTableBody>

    </CustomTable>

    <div class="my-6 flex items-center gap-2">

        <Paginator :links="organisations.links"></Paginator>

    </div>

</template>
