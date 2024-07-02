<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import FormInput from '../Shared/FormInput.vue';
import FormValidationError from '../Shared/FormValidationError.vue';

const formInputs = useForm({
    email: '',
    password: ''
});

</script>


<template>

    <div class="w-screen min-h-screen bg-main grid place-items-center">

        <div class="bg-white rounded-md space-y-10 w-[90%] sm:w-[450px]">

            <div class="space-y-4 mt-6">
                <h1 class="w-fit mx-auto text-3xl font-bold text-gray-700 capitalize">welcome back</h1>
                <hr class="h-0.5 w-1/4 bg-gray-200 rounded-md mx-auto">
            </div>

            <form @submit.prevent="formInputs.post('/login')" class="flex flex-col gap-6">

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.email = val" label="email" placeHolder="example@mail.Com" input-type="text" />
                    <FormValidationError v-if="formInputs.errors.email">{{ formInputs.errors.email }}</FormValidationError>
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <FormInput @update-value="(val) => formInputs.password = val" label="password" placeHolder="*******" input-type="text" />
                    <FormValidationError v-if="formInputs.errors.password">{{ formInputs.errors.password }}</FormValidationError>
                </div>

                <div class="px-6 flex items-center gap-1">
                    <input class="h-8 cursor-pointer" type="checkbox" name="remember" id="remember" placeholder="**********">
                    <label class="cursor-pointer" for="remember">Remember me</label>
                </div>

                <div class="px-6 flex items-center gap-1">
                    <Link class="text-blue-500 hover:underline" href="/reset-password">Forget password ?</Link>
                </div>

                <div class="px-6 flex items-center gap-1">
                    <Link class="text-blue-500 hover:underline" href="/register">Not yet have an account ?</Link>
                </div>

                <div class="bg-gray-200 rounded-b-md py-6 flex flex-row-reverse pr-6">
                    <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="formInputs.processing">login</button>
                </div>

            </form>

        </div>

    </div>

</template>
