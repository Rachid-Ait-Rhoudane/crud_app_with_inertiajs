<script setup>

import { computed } from 'vue';
import swal from 'sweetalert';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import ShowInfo from '../../Shared/ShowInfo.vue';
import CustomTable from '../../Shared/CustomTable.vue';
import CustomTableBody from '../../Shared/CustomTableBody.vue';
import CustomTableBodyColumn from '../../Shared/CustomTableBodyColumn.vue';
import CustomTableHeadColumn from '../../Shared/CustomTableHeadColumn.vue';

let props = defineProps({
    organisation: {
        type: Object,
        required: true
    }
});

const showAlert = () => {

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this organisation!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                router.delete('/organisations/' + props.organisation.id);
            }
    });

};

</script>

<template>

    <h1 class="text-3xl font-bold mt-16 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/organisations">Organisations/</Link> {{ organisation.name }}
    </h1>

    <div class="my-16 p-8 bg-white rounded-md shadow-lg flex flex-col gap-4">

        <ShowInfo info="name">
            {{ organisation.name }}
        </ShowInfo>

        <ShowInfo info="email">
            {{ organisation.email }}
        </ShowInfo>

        <ShowInfo info="address">
            {{ organisation.address }}
        </ShowInfo>

        <ShowInfo info="city">
            {{ organisation.city }}
        </ShowInfo>

        <ShowInfo info="phone">
            {{ organisation.phone }}
        </ShowInfo>

        <ShowInfo info="country">
            {{ organisation.country }}
        </ShowInfo>

        <div class="flex items-center justify-between mt-8">
            <button type="button" @click="showAlert" class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white capitalize rounded-md">delete</button>
            <Link class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white capitalize rounded-md" :href="'/organisations/edit/' + organisation.id">edit</Link>
        </div>

    </div>

    <h1 class="mb-4 text-3xl font-bold text-gray-500">Contacts</h1>

    <CustomTable class="mb-16">

        <template v-slot:head>
            <CustomTableHeadColumn class="py-3">name</CustomTableHeadColumn>
            <CustomTableHeadColumn>city</CustomTableHeadColumn>
            <CustomTableHeadColumn>phone</CustomTableHeadColumn>
        </template>

        <CustomTableBody v-for="contact in organisation.contacts" :key="contact.id">
            <CustomTableBodyColumn>{{ contact.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.city }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.phone }}</CustomTableBodyColumn>
        </CustomTableBody>

    </CustomTable>

</template>
