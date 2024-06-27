<script setup>

import Navbar from './Navbar.vue';
import MobileNavbar from './MobileNavbar.vue';
import Menu from './Menu.vue';

</script>


<template>

    <div class="flex min-h-screen">

        <Navbar />

        <section class="flex-1 grid grid-rows-12">

            <MobileNavbar />

            <div class="flex items-center justify-between row-span-1 px-4">
                <h3 class="font-bold text-third italic capitalize">
                Inertiajs
                </h3>
                <div class="relative">
                    <Menu />
                </div>
            </div>

            <div class="row-span-10 md:row-span-11 bg-gray-100 px-4 md:px-8 overflow-hidden">
                <slot />
            </div>

        </section>

    </div>

</template>
