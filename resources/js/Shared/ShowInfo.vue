<script setup>

defineProps({
    info: {
        type: String,
        required: true
    }
});

</script>

<template>

    <div class="flex gap-4 capitalize px-8">
        <span class="font-bold text-main">{{ info }} :</span>
        <span class="font-bold text-gray-500">
            <slot></slot>
        </span>
    </div>

</template>
