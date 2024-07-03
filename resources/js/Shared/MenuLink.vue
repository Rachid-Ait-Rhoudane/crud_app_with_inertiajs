<script setup>

import { Link } from '@inertiajs/vue3';

defineProps({
    active: {
        type: Boolean,
        reuired: true
    }
});

</script>


<template>

    <Link
        class="flex items-center gap-2 p-2 capitalize"
        :class="{'bg-secondary text-white': active, 'hover:bg-gray-300': !active}"
    >
        <slot></slot>
    </Link>

</template>
