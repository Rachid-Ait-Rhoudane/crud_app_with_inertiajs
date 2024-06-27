<script setup>

import NavLink from './NavLink.vue';

</script>


<template>

    <nav class="bg-main hidden md:grid md:grid-rows-12 md:min-w-[250px]">

        <h1 class="row-span-1 flex justify-center items-center uppercase text-3xl font-black italic text-white bg-third">
            crud
        </h1>

        <ul class="w-full row-span-11 mt-10">
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
                <NavLink href="/contacts" :active="false">
                    <i class="fa-solid fa-print text-white"></i>
                    <span>Reports</span>
                </NavLink>
            </li>
        </ul>

    </nav>

</template>
