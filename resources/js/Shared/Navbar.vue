<script setup>

import NavLink from './NavLink.vue';

</script>


<template>

    <nav class="bg-main hidden md:block md:min-w-11 lg:min-w-[250px]">

        <h1 class="hidden lg:h-20 lg:flex lg:justify-center lg:items-center lg:uppercase lg:text-3xl lg:font-black italic lg:text-white lg:bg-third">
            crud
        </h1>

        <ul class="w-full mt-10">
            <li>
                <NavLink href="/" :active="$page.component == 'Home'">
                    <i class="fa-solid fa-gauge text-white"></i>
                    <span class="hidden lg:block">Dashbord</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/organisations" :active="$page.component == 'Organisation/Index'">
                    <i class="fa-solid fa-sitemap text-white"></i>
                    <span class="hidden lg:block">Organisations</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/contacts" :active="$page.component == 'Contact/Index'">
                    <i class="fa-solid fa-address-book text-white"></i>
                    <span class="hidden lg:block">Contacts</span>
                </NavLink>
            </li>
            <li>
                <NavLink href="/trash" :active="$page.component == 'Trash'">
                    <i class="fa-solid fa-trash text-white"></i>
                    <span class="hidden lg:block">Trash</span>
                </NavLink>
            </li>
        </ul>

    </nav>

</template>
