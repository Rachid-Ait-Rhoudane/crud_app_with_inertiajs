<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import FormInput from '../../Shared/FormInput.vue';
import FormSelect from '../../Shared/FormSelect.vue';
import FormSelectOption from '../../Shared/FormSelectOption.vue';
import FormValidationError from '../../Shared/FormValidationError.vue';

let props = defineProps({
    contact: {
        type: Object,
        required: true
    },
    organisations: {
        type: Object,
        required: true
    }
});

const formInputs = useForm({
    name: props.contact.name,
    organisation: props.contact.organisation.id,
    city: props.contact.city,
    phone: props.contact.phone,
})

</script>


<template>

    <h1 class="text-3xl font-bold mt-16 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/contacts">Contacts/</Link> {{ contact.name }}
    </h1>

    <form @submit.prevent="formInputs.put('/contacts/' + contact.id)" class="my-16 p-8 bg-white grid grid-cols-1 lg:grid-cols-2 gap-6 rounded-md shadow-lg">

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.name = val" label="name" placeHolder="Contact name" input-type="text" :input-value="contact.name" />
            <FormValidationError v-if="formInputs.errors.name">{{ formInputs.errors.name }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.city = val" label="city" placeHolder="Contact city" input-type="text" :input-value="contact.city" />
            <FormValidationError v-if="formInputs.errors.city">{{ formInputs.errors.city }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.phone = val" label="phone" placeHolder="Contact phone" input-type="text" :input-value="contact.phone" />
            <FormValidationError v-if="formInputs.errors.phone">{{ formInputs.errors.phone }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormSelect @update-value="(val) => formInputs.organisation = val" label="organisation" :select-value="contact.organisation.id">
                <FormSelectOption v-for="organisation in organisations" :key="organisation.id" :value="organisation.id">
                    {{ organisation.name }}
                </FormSelectOption>
            </FormSelect>
        </div>

        <div class="col-span-1 lg:col-span-2 flex justify-end">
            <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="formInputs.processing">update</button>
        </div>

    </form>

</template>
