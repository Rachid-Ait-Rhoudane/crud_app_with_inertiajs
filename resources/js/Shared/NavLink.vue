<script setup>

import { Link } from '@inertiajs/vue3';

</script>


<template>

    <Link class="flex items-center gap-2 text-xl w-full text-gray-100 py-6 pl-2 hover:bg-secondary">
        <slot />
    </Link>

</template>
