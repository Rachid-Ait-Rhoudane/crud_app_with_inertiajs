<script setup>

defineProps({
    label: {
        type: String,
        required: true
    },
    selectValue: {
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
        <select :value="selectValue" @change="updateValue" class="w-full h-10 border border-gray-200 rounded-md focus:outline-none px-3 capitalize cursor-pointer" :id="label">
            <option class="text-gray-500" default disabled>Choose a country</option>
            <slot></slot>
        </select>

</template>
