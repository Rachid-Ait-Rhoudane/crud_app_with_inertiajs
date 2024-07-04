<script setup>

import SuccessMessage from '../Shared/SuccessMessage.vue';
import TrashedOrganisations from '../Shared/TrashedOrganisations.vue';
import TrashedContacts from '../Shared/TrashedContacts.vue';

defineProps({
    organisations: {
        type: Object,
        required: true
    },
    contacts: {
        type: Object,
        required: true
    },
    message: {
        default: null
    }
});

</script>

<template>

    <SuccessMessage :message="message" :key="Date.now()" />

    <h1 class="mt-16 text-xl md:text-3xl font-bold">Trash</h1>

    <TrashedOrganisations :organisations="organisations" />

    <TrashedContacts :contacts="contacts" />

</template>
