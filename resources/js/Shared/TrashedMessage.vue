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

    <div v-if="showMessage" class="bg-orange-500 w-full rounded-md my-4 h-14 flex items-center justify-between px-4 capitalize text-white font-bold">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-trash text-xl"></i>
            <span class="block">{{ message }}</span>
        </div>
        <button @click="showMessage = false" type="button" class="text-gray-100 hover:text-gray-200">
            restore
        </button>
    </div>

</template>
