<script setup>

import swal from 'sweetalert';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import ShowInfo from '../../Shared/ShowInfo.vue';
import CustomTable from '../../Shared/CustomTable.vue';
import SuccessMessage from '../../Shared/SuccessMessage.vue';
import TrashedMessage from '../../Shared/TrashedMessage.vue';
import CustomTableBody from '../../Shared/CustomTableBody.vue';
import CustomTableBodyColumn from '../../Shared/CustomTableBodyColumn.vue';
import CustomTableHeadColumn from '../../Shared/CustomTableHeadColumn.vue';

let props = defineProps({
    organisation: {
        type: Object,
        required: true
    },
    isTrashed: {
        type: Boolean,
        required: true
    },
    message: {
        default: null
    }
});

const showAlert = () => {

    swal({
        title: "Are you sure?",
        text: "This organisation will be moved to the trash!",
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

let removeOrganisationFromTrash = () => {
    router.post('/organisations/restore/' + props.organisation.id);
}

</script>

<template>

    <SuccessMessage :message="message" :key="Date.now()" />

    <h1 class="text-3xl font-bold mt-16 my-8 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/organisations">Organisations/</Link> {{ organisation.name }}
    </h1>

    <TrashedMessage @remove-from-trash="removeOrganisationFromTrash" v-if="isTrashed" message="this organisation was Trashed" />

    <div class="my-8 bg-white rounded-md shadow-lg flex flex-col gap-4 pt-8">

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

        <div class="relative mt-8 bg-gray-100 px-8 h-20 rounded-b-md">
            <button v-if="!isTrashed" type="button" @click="showAlert" class="absolute top-1/2 -translate-y-1/2 left-8 px-3 py-2 bg-red-500 hover:bg-red-600 text-white capitalize rounded-md">delete</button>
            <Link class="absolute top-1/2 -translate-y-1/2 right-8 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white capitalize rounded-md" :href="'/organisations/edit/' + organisation.id">edit</Link>
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
            <CustomTableBodyColumn class="py-3">{{ contact.name }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.city }}</CustomTableBodyColumn>
            <CustomTableBodyColumn>{{ contact.phone }}</CustomTableBodyColumn>
        </CustomTableBody>

        <CustomTableBody v-if="! organisation.contacts.length">
            <CustomTableBodyColumn colspan="6" class="py-3 italic text-gray-500 text-center">No data found</CustomTableBodyColumn>
        </CustomTableBody>

    </CustomTable>

</template>
