<script setup>

import { ref } from 'vue';

let props = defineProps({
    message: {
        required: true
    }
});

let showMessage = ref(false);

if(props.message) {
   showMessage.value = true;
}

</script>

<template>

    <div v-if="showMessage" class="relative bg-green-500 w-full rounded-md my-4 h-14 flex items-center px-4 capitalize text-white font-bold">
        <button @click="showMessage = false" type="button" class="absolute top-1 right-3">
            <i class="fa-solid fa-xmark text-gray-500 text-sm"></i>
        </button>
        {{ message }}
    </div>

</template>
