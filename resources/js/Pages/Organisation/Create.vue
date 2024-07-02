<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import FormInput from '../../Shared/FormInput.vue';
import FormSelect from '../../Shared/FormSelect.vue';
import FormSelectOption from '../../Shared/FormSelectOption.vue';
import FormValidationError from '../../Shared/FormValidationError.vue';

const formInputs = useForm({
    name: '',
    email: '',
    address: '',
    city: '',
    phone: '',
    country: 'united states'
})

</script>


<template>

    <h1 class="text-3xl font-bold mt-16 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/organisations">Organisations/</Link> Create
    </h1>

    <form @submit.prevent="formInputs.post('/organisations')" class="my-16 p-8 bg-white grid grid-cols-1 lg:grid-cols-2 gap-6 rounded-md shadow-lg">

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.name = val" label="name" placeHolder="Organisation name" input-type="text" />
            <FormValidationError v-if="formInputs.errors.name">{{ formInputs.errors.name }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.email = val" label="email" placeHolder="Organisation email" input-type="email" />
            <FormValidationError v-if="formInputs.errors.email">{{ formInputs.errors.email }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.address = val" label="address" placeHolder="Organisation address" input-type="text" />
            <FormValidationError v-if="formInputs.errors.address">{{ formInputs.errors.address }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.city = val" label="city" placeHolder="Organisation city" input-type="text" />
            <FormValidationError v-if="formInputs.errors.city">{{ formInputs.errors.city }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormInput @update-value="(val) => formInputs.phone = val" label="phone" placeHolder="Organisation phone" input-type="text" />
            <FormValidationError v-if="formInputs.errors.phone">{{ formInputs.errors.phone }}</FormValidationError>
        </div>

        <div class="space-y-2">
            <FormSelect @update-value="(val) => formInputs.country = val" label="country">
                <FormSelectOption value="united states">united states</FormSelectOption>
                <FormSelectOption value="mexico">mexico</FormSelectOption>
                <FormSelectOption value="spain">spain</FormSelectOption>
                <FormSelectOption value="france">france</FormSelectOption>
                <FormSelectOption value="united kingdom">united kingdom</FormSelectOption>
            </FormSelect>
        </div>

        <div class="col-span-1 lg:col-span-2 flex justify-end">
            <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="formInputs.processing">submit</button>
        </div>

    </form>

</template>
