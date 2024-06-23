<script setup>

import Navbar from '../Shared/Navbar.vue';
import Menu from '../Shared/Menu.vue';

</script>


<template>

    <div class="grid grid-cols-12 grid-rows-12">

        <Navbar class="col-span-2 row-span-12" />

        <section class="col-span-10 row-span-1 flex justify-between items-center bg-gray-100 px-10">
            <h3 class="font-bold text-third italic capitalize">
                CRUD appication with inertiajs
            </h3>
            <div class="relative bg-green-500">
                <Menu />
            </div>
        </section>

    </div>

</template>
