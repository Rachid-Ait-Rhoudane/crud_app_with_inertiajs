<script setup>

import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import swal from 'sweetalert';

let props = defineProps({
    organisation: {
        type: Object,
        required: true
    },
    contacts: {
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

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main">name:</span>
            <span class="font-bold text-gray-500">{{ organisation.name }}</span>
        </div>

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main capitalize">email:</span>
            <span class="font-bold text-gray-500">{{ organisation.email }}</span>
        </div>

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main capitalize">address:</span>
            <span class="font-bold text-gray-500">{{ organisation.address }}</span>
        </div>

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main capitalize">city:</span>
            <span class="font-bold text-gray-500">{{ organisation.city }}</span>
        </div>

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main capitalize">phone:</span>
            <span class="font-bold text-gray-500">{{ organisation.phone }}</span>
        </div>

        <div class="flex gap-4 capitalize">
            <span class="font-bold text-main capitalize">country:</span>
            <span class="font-bold text-gray-500">{{ organisation.country }}</span>
        </div>

        <div class="flex items-center justify-between mt-8">
            <button type="button" @click="showAlert" class="px-3 py-2 bg-red-500 hover:bg-red-600 text-white capitalize rounded-md">delete</button>
            <Link class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white capitalize rounded-md" :href="'/organisations/edit/' + organisation.id">edit</Link>
        </div>

    </div>

    <h1 class="mb-4 text-3xl font-bold text-gray-500">Contacts</h1>

    <div class="overflow-x-auto mb-16">

        <table class="min-w-[650px] w-full bg-white">

            <thead class="border-b border-b-gray-200 text-base md:text-2xl capitalize text-white bg-main">
                <tr>
                    <th class="text-left px-4 py-3">name</th>
                    <th class="text-left px-4 py-3">city</th>
                    <th class="text-left px-4 py-3">phone</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b border-b-gray-200 even:bg-gray-200 whitespace-nowrap text-sm md:text-base" v-for="contact in contacts" :key="contact.id">
                    <td class="text-left px-4 py-3">{{ contact.name }}</td>
                    <td class="text-left px-4">{{ contact.city }}</td>
                    <td class="text-left px-4">{{ contact.phone }}</td>
                </tr>
            </tbody>

        </table>

    </div>

</template>
