<script setup>

import { Link } from '@inertiajs/vue3';
import Paginator from './Paginator.vue';
import { router } from '@inertiajs/vue3';
import CustomTable from './CustomTable.vue';
import CustomTableBody from './CustomTableBody.vue';
import CustomTableBodyColumn from './CustomTableBodyColumn.vue';
import CustomTableHeadColumn from './CustomTableHeadColumn.vue';

defineProps({
    contacts: {
        type: Object,
        required: true
    }
})

const restore = (id) => {

    router.post('/contacts/restore/'+id);
}

</script>

<template>

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Contacts</h1>

    <CustomTable>

        <template v-slot:head>
            <CustomTableHeadColumn class="py-3">name</CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
        </template>

        <CustomTableBody v-for="contact in contacts.data" :key="contact.id">
            <CustomTableBodyColumn class="py-3">{{ contact.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <Link class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/contacts/' + contact.id">
                    <i class="fa-solid fa-eye"></i>
                    <span>View</span>
                </Link>
            </CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <button @click="restore(contact.id)" type="button" class="flex items-center gap-1 text-blue-500 hover:text-blue-600">
                    <i class="fa-solid fa-trash-can-arrow-up"></i>
                    <span>Restore</span>
                </button>
            </CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <button type="button" class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/contacts/' + contact.id">
                    <i class="fa-solid fa-trash"></i>
                    <span>Delete</span>
                </button>
            </CustomTableBodyColumn>
        </CustomTableBody>

        <CustomTableBody v-if="! contacts.data.length">
            <CustomTableBodyColumn colspan="6" class="py-3 italic text-gray-500 text-center">No data found</CustomTableBodyColumn>
        </CustomTableBody>

    </CustomTable>

    <div class="my-6 flex items-center gap-2">

        <Paginator :links="contacts.links"></Paginator>

    </div>

</template>
