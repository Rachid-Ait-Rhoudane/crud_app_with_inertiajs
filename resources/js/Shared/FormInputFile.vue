<script setup>

import { ref, watch } from 'vue';

defineProps({
    label: {
        type: String,
        required: true
    }
});

let fileName = ref('no file chosen');

let file = ref(null);

let emits = defineEmits(['updateValue']);

const updateValue = (e) => {

    file.value = e.target.files[0];
}

const resetValue = () => {

    file.value = null;
}

watch(file, (val) => {

    fileName.value = val ? val.name : 'no file chosen';

    emits('updateValue', file.value);

});

</script>

<template>

    <label  class="block w-fit font-bold capitalize text-gray-700" :for="label">{{ label }}:</label>
    <div class="relative">
        <input @change="updateValue" class="relative z-10 w-full file:hidden text-transparent bg-transparent h-24 border-2 border-dashed border-main" :id="label" type="file">
        <div class="absolute top-0 left 0 w-full h-full flex flex-col items-center justify-center gap-1 text-main text-center bg-blue-100">
            <i class="fa-solid fa-image text-2xl"></i>
            <span class="block text-sm">{{ fileName }}</span>
        </div>
        <button v-if="file" @click="resetValue" class="absolute top-2 right-4 text-main hover:underline z-20" type="button">
            <i class="fa-solid fa-x text-sm"></i>
        </button>
    </div>

</template>
