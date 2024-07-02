<script setup>

import swal from 'sweetalert';
import { Link } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import ShowInfo from '../../Shared/ShowInfo.vue';
import SuccessMessage from '../../Shared/SuccessMessage.vue';
import TrashedMessage from '../../Shared/TrashedMessage.vue';

let props = defineProps({
    contact: {
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
        text: "Once deleted, you will not be able to recover this contact!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                router.delete('/contacts/' + props.contact.id);
            }
    });

};

const removeContactFromTrash = () => {
    router.post('/contacts/restore/' + props.contact.id);
}

</script>

<template>

    <SuccessMessage :message="message" :key="Date.now()" />

    <h1 class="text-3xl font-bold mt-16 my-8 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/contacts">Contacts/</Link> {{ contact.name }}
    </h1>

    <TrashedMessage @remove-from-trash="removeContactFromTrash" v-if="isTrashed" message="this organisation was Trashed" />

    <div class="my-8 bg-white rounded-md shadow-lg flex flex-col gap-4 pt-8">

        <ShowInfo info="name">
            {{ contact.name }}
        </ShowInfo>

        <ShowInfo info="city">
            {{ contact.city }}
        </ShowInfo>

        <ShowInfo info="organisation">
            {{ contact.organisation.name }}
        </ShowInfo>

        <ShowInfo info="phone">
            {{ contact.phone }}
        </ShowInfo>

        <div class="relative mt-8 bg-gray-100 px-8 h-20 rounded-b-md">
            <button v-if="!isTrashed" type="button" @click="showAlert" class="absolute top-1/2 -translate-y-1/2 left-8 px-3 py-2 bg-red-500 hover:bg-red-600 text-white capitalize rounded-md">delete</button>
            <Link class="absolute top-1/2 -translate-y-1/2 right-8 px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white capitalize rounded-md" :href="'/contacts/edit/' + contact.id">edit</Link>
        </div>

    </div>

</template>
