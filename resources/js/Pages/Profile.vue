<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import FormInput from '../Shared/FormInput.vue';
import FormSelect from '../Shared/FormSelect.vue';
import FormSelectOption from '../Shared/FormSelectOption.vue';
import FormValidationError from '../Shared/FormValidationError.vue';
import FormInputFile from '../Shared/FormInputFile.vue';

let props = defineProps({
    user: {
        type: Object,
        required: true
    }
});

const formInputs = useForm({
    name: props.user.name,
    city: props.user.city,
    address: props.user.address,
    email: props.user.email,
    avatar: null,
    password: '',
    password_confirmation: ''
});

</script>


<template>

    <h1 class="text-3xl font-bold mt-16 text-gray-600">
        <Link class="text-secondary hover:text-main" href="/contacts">Users/</Link> {{ user.name }}
    </h1>

    <form @submit.prevent="formInputs.post('/users/'+user.id)" class="bg-white pt-4 rounded-t-md grid grid-cols-1 sm:grid-cols-2 gap-6 overflow-hidden my-16">

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.name = val" label="name" placeHolder="Your name" input-type="text" :input-value="user.name" />
            <FormValidationError v-if="formInputs.errors.name">{{ formInputs.errors.name }}</FormValidationError>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.city = val" label="city" placeHolder="Your city" input-type="text" :input-value="user.city" />
            <FormValidationError v-if="formInputs.errors.city">{{ formInputs.errors.city }}</FormValidationError>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.address = val" label="address" placeHolder="Your address" input-type="text" :input-value="user.address" />
            <FormValidationError v-if="formInputs.errors.address">{{ formInputs.errors.address }}</FormValidationError>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.email = val" label="email" placeHolder="example@mail.Com" input-type="email" :input-value="user.email" />
            <FormValidationError v-if="formInputs.errors.email">{{ formInputs.errors.email }}</FormValidationError>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormSelect @update-value="(val) => formInputs.role = val" label="role" :select-value="user.role">
                <FormSelectOption value="owner">Owner</FormSelectOption>
                <FormSelectOption value="user">User</FormSelectOption>
            </FormSelect>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInputFile @update-value="(val) => formInputs.avatar = val" label="avatar" />
            <FormValidationError v-if="formInputs.errors.email">{{ formInputs.errors.email }}</FormValidationError>
            <progress v-if="formInputs.progress" :value="formInputs.progress.percentage" max="100">
                {{ formInputs.progress.percentage }}%
            </progress>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.password = val" label="password" placeHolder="*******" input-type="password" />
            <FormValidationError v-if="formInputs.errors.password">{{ formInputs.errors.password }}</FormValidationError>
        </div>

        <div class="flex flex-col gap-1 px-6">
            <FormInput @update-value="(val) => formInputs.password_confirmation = val" label="password confirmation" placeHolder="*******" input-type="password" />
            <FormValidationError v-if="formInputs.errors.password_confirmation">{{ formInputs.errors.password_confirmation }}</FormValidationError>
        </div>

        <div class="bg-gray-200 rounded-b-md py-6 flex flex-row-reverse pr-6 sm:col-span-2">
            <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="formInputs.processing">update</button>
        </div>

    </form>

</template>
