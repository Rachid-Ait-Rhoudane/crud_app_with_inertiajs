<script setup>

import NavLink from '../Shared/NavLink.vue';

</script>


<template>

    <nav class="h-screen bg-main grid grid-rows-12">

        <h1 class="row-span-1 flex justify-center items-center uppercase text-3xl font-black italic text-white bg-third text-center">crud</h1>

        <ul class="w-full mx-auto row-span-11 mt-10">
            <li>
                <NavLink href="/">
                    <i class="fa-solid fa-gauge text-white" />
                    <span>Dashbord</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/organisations">
                    <i class="fa-solid fa-sitemap text-white" />
                    <span>Organisations</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/contacts">
                    <i class="fa-solid fa-address-book text-white" />
                    <span>Contacts</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/contacts">
                    <i class="fa-solid fa-print text-white" />
                    <span>Reports</span>
                </NavLink>
            </li>
        </ul>

    </nav>

</template>
