<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import FormInput from '../Shared/FormInput.vue';
import FormValidationError from '../Shared/FormValidationError.vue';

const formInputs = useForm({
    name: '',
    city: '',
    address: '',
    email: '',
    password: '',
    password_confirmation: ''
});

</script>


<template>

    <div class="w-full min-h-screen bg-main grid place-items-center">

        <div class="bg-white rounded-md space-y-10 w-[90%] lg:w-3/4 my-4">

            <div class="space-y-4 mt-6">
                <h1 class="w-fit mx-auto text-3xl font-bold text-gray-700 capitalize">Create an account</h1>
                <hr class="h-0.5 w-1/4 bg-gray-200 rounded-md mx-auto">
            </div>

            <form @submit.prevent="formInputs.post('/register')" class="grid grid-cols-1 sm:grid-cols-2 gap-6 overflow-hidden">

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.name = val" label="name" placeHolder="Your name" input-type="text" />
                    <FormValidationError v-if="formInputs.errors.name">{{ formInputs.errors.name }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.city = val" label="city" placeHolder="Your city" input-type="text" />
                    <FormValidationError v-if="formInputs.errors.city">{{ formInputs.errors.city }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.address = val" label="address" placeHolder="Your address" input-type="text" />
                    <FormValidationError v-if="formInputs.errors.address">{{ formInputs.errors.address }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.email = val" label="email" placeHolder="example@mail.Com" input-type="email" />
                    <FormValidationError v-if="formInputs.errors.email">{{ formInputs.errors.email }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.password = val" label="password" placeHolder="*******" input-type="password" />
                    <FormValidationError v-if="formInputs.errors.password">{{ formInputs.errors.password }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.password_confirmation = val" label="password confirmation" placeHolder="*******" input-type="password" />
                    <FormValidationError v-if="formInputs.errors.password_confirmation">{{ formInputs.errors.password_confirmation }}</FormValidationError>
                </div>

                <div class="px-6 flex items-center gap-1 sm:col-span-2">
                    <Link class="text-blue-500 hover:underline" href="/login">Already have an account ?</Link>
                </div>

                <div class="bg-gray-200 rounded-b-md py-6 flex flex-row-reverse pr-6 sm:col-span-2">
                    <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="formInputs.processing">register</button>
                </div>

            </form>

        </div>

    </div>

</template>
