<script setup>

import { Link } from '@inertiajs/vue3';
import Search from '../../Shared/Search.vue';
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

</script>

<template>

    <SuccessMessage :message="message" />

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Organisations</h1>

    <div class="my-8 flex items-center justify-between">

        <Search url="/organisations" :filters="filters" />

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
