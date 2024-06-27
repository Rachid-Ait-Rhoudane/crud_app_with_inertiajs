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
        :class="{'bg-secondary': active, 'hover:bg-gray-900/35': !active}"
        class="flex items-center gap-2 text-xl w-full text-gray-100 py-6 pl-2"
    >
        <slot />
    </Link>

</template>
