<script setup>

defineProps({
    label: {
        type: String,
        required: true
    },
    inputType: {
        type: String,
        required: true
    },
    placeHolder: {
        type: String,
        required: true,
        default: ''
    },
    inputValue: {
        type: String,
        default: ''
    }
});

let emits = defineEmits(['updateValue']);

let updateValue = (e) => {

    emits('updateValue', e.target.value);
}

</script>

<template>

    <label class="block w-fit font-bold capitalize text-gray-700" :for="label">{{ label }}:</label>
    <input
        @change="updateValue"
        class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3"
        :type="inputType"
        :value="inputValue"
        :placeholder="placeHolder"
        :id="label"
    >

</template>
