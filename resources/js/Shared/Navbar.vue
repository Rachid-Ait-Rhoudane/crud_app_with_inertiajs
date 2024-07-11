<script setup>

import NavLink from './NavLink.vue';

</script>


<template>

    <nav class="bg-main hidden md:block md:min-w-[250px]">

        <h1 class="h-20 flex justify-center items-center uppercase text-3xl font-black italic text-white bg-third">
            crud
        </h1>

        <ul class="w-full mt-10">
            <li>
                <NavLink href="/" :active="$page.component == 'Home'">
                    <i class="fa-solid fa-gauge text-white"></i>
                    <span>Dashbord</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/organisations" :active="$page.component == 'Organisation/Index'">
                    <i class="fa-solid fa-sitemap text-white"></i>
                    <span>Organisations</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/contacts" :active="$page.component == 'Contact/Index'">
                    <i class="fa-solid fa-address-book text-white"></i>
                    <span>Contacts</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/trash" :active="$page.component == 'Trash'">
                    <i class="fa-solid fa-trash text-white"></i>
                    <span>Trash</span>
                </NavLink>
            </li>
        </ul>

    </nav>

</template>
