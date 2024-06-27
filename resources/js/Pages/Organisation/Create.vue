<script setup>

import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    address: '',
    city: '',
    phone: '',
    country: 'united states'
})

</script>


<template>

    <h1 class="text-3xl font-bold mt-16 text-gray-600"> <Link class="text-secondary hover:text-main" href="/organisations">Organisation/</Link> Create</h1>

    <form @submit.prevent="form.post('/organisations')" class="mt-16 p-8 bg-white grid grid-cols-2 gap-6 rounded-md shadow-lg">

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="name">name:</label>
            <input v-model="form.name" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3" type="text" placeholder="Organisation name" id="name">
            <span v-if="form.errors.name" class="block text-xs text-red-500">{{ form.errors.name }}</span>
        </div>

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="email">email:</label>
            <input v-model="form.email" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3" type="text" placeholder="Organisation email" id="email">
            <span v-if="form.errors.email" class="block text-xs text-red-500">{{ form.errors.email }}</span>
        </div>

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="address">address:</label>
            <input v-model="form.address" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3" type="text" placeholder="Organisation address" id="address">
            <span v-if="form.errors.address" class="block text-xs text-red-500">{{ form.errors.address }}</span>
        </div>

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="city">city:</label>
            <input v-model="form.city" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3" type="text" placeholder="Organisation city" id="city">
            <span v-if="form.errors.city" class="block text-xs text-red-500">{{ form.errors.city }}</span>
        </div>

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="phone">phone:</label>
            <input v-model="form.phone" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3" type="text" placeholder="Organisation phone" id="phone">
            <span v-if="form.errors.phone" class="block text-xs text-red-500">{{ form.errors.phone }}</span>
        </div>

        <div class="space-y-2">
            <label class="block w-fit font-bold capitalize text-gray-700" for="country">country:</label>
            <select v-model="form.country" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3 capitalize cursor-pointer" id="country">
                <option class="capitalize" value="united states">united states</option>
                <option class="capitalize" value="mexico">mexico</option>
                <option class="capitalize" value="spain">spain</option>
                <option class="capitalize" value="france">france</option>
                <option class="capitalize" value="united kingdom">united kingdom</option>
            </select>
            <span v-if="form.errors.country" class="block text-xs text-red-500">{{ form.errors.country }}</span>
        </div>

        <div class="col-span-2 flex justify-end">
            <button class="px-3 py-2 bg-secondary hover:bg-orange-500 text-white font-bold capitalize rounded-md disabled:bg-gray-200 disabled:cursor-not-allowed" type="submit" :disabled="form.processing">submit</button>
        </div>

    </form>

</template>
