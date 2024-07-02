<script setup>

import { Link } from '@inertiajs/vue3';
import Search from '../../Shared/Search.vue';
import Paginator from '../../Shared/Paginator.vue';
import CustomTable from '../../Shared/CustomTable.vue';
import SuccessMessage from '../../Shared/SuccessMessage.vue';
import CustomTableBody from '../../Shared/CustomTableBody.vue';
import CustomTableHeadColumn from '../../Shared/CustomTableHeadColumn.vue';
import CustomTableBodyColumn from '../../Shared/CustomTableBodyColumn.vue';

defineProps({
    contacts: {
        type: Object,
        required: true
    },
    filters: {
        type: Object
    },
    message: {
        default: null
    }
})

</script>

<template>

    <SuccessMessage :message="message" />

    <h1 class="mt-16 text-3xl font-bold">Contacts</h1>

    <div class="my-8 flex items-center justify-between">

        <Search url="/contacts" :filters="filters" />

        <Link class="px-3 py-2 rounded-md bg-secondary text-white hover:bg-orange-500 flex items-center gap-2" href="/contacts/create">
            <span class="capitalize hidden lg:block">create</span>
            <i class="fa-solid fa-plus text-xs md:text-sm"></i>
        </Link>

    </div>

    <CustomTable>

        <template v-slot:head>
            <CustomTableHeadColumn class="py-3">name</CustomTableHeadColumn>
            <CustomTableHeadColumn>city</CustomTableHeadColumn>
            <CustomTableHeadColumn>organisation</CustomTableHeadColumn>
            <CustomTableHeadColumn>phone</CustomTableHeadColumn>
            <CustomTableHeadColumn></CustomTableHeadColumn>
        </template>

        <CustomTableBody v-for="contact in contacts.data" :key="contact.id">
            <CustomTableBodyColumn class="py-3">{{ contact.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.city }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.organisation }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.phone }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>
                <Link class="flex items-center gap-1 text-blue-500 hover:text-blue-600" :href="'/contacts/' + contact.id">
                    <i class="fa-solid fa-eye"></i>
                    <span>View</span>
                </Link>
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
