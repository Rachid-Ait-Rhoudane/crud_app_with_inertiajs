<script setup>

let props = defineProps({
    message: {
        required: true
    }
});

defineEmits(['removeFromTrash']);

</script>

<template>

    <div class="bg-orange-500 w-full rounded-md my-4 h-14 flex items-center justify-between px-4 capitalize text-white font-bold">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-trash text-xl"></i>
            <span class="block">{{ message }}</span>
        </div>
        <button @click="$emit('removeFromTrash')" type="button" class="text-gray-100 hover:text-gray-200">
            restore
        </button>
    </div>

</template>
