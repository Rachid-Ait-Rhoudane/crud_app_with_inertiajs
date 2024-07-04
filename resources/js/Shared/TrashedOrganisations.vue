<script setup>

import { Link } from '@inertiajs/vue3';
import Paginator from './Paginator.vue';
import { router } from '@inertiajs/vue3';
import CustomTable from './CustomTable.vue';
import CustomTableBody from './CustomTableBody.vue';
import CustomTableBodyColumn from './CustomTableBodyColumn.vue';
import CustomTableHeadColumn from './CustomTableHeadColumn.vue';

defineProps({
    organisations: {
        type: Object,
        required: true
    }
})

const restore = (id) => {

    router.post('/organisations/restore/'+id);
}

</script>

<template>

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Organisations</h1>

    <CustomTable>

        <template v-slot:head>
            <CustomTableHeadColumn class="py-3">name</CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
        </template>

        <CustomTableBody v-for="organisation in organisations.data" :key="organisation.id">
            <CustomTableBodyColumn class="py-3">{{ organisation.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <Link class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/organisations/' + organisation.id">
                    <i class="fa-solid fa-eye"></i>
                    <span>View</span>
                </Link>
            </CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <button @click="restore(organisation.id)" type="button" class="flex items-center gap-1 text-blue-500 hover:text-blue-600">
                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                    <span>Restore</span>
                </button>
            </CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <button type="button" class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/organisations/' + organisation.id">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete</span>
                </button>
            </CustomTableBodyColumn>
        </CustomTableBody>

        <CustomTableBody v-if="! organisations.data.length">
            <CustomTableBodyColumn colspan="6" class="py-3 italic text-gray-500 text-center">No data found</CustomTableBodyColumn>
        </CustomTableBody>

    </CustomTable>

    <div class="my-6 flex items-center gap-2">

        <Paginator :links="organisations.links"></Paginator>

    </div>

</template>
