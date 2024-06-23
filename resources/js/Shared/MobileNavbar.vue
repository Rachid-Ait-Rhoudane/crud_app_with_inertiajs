<script setup>

import NavLink from './NavLink.vue';
import { onMounted } from 'vue';

onMounted(() => {

    let menuList = document.getElementById("mobile-menu-list");

    document.addEventListener('click', (e) => {

        if(e.target.id == "mobile-menu-btn" || e.target.parentNode.id == "mobile-menu-btn") {

            menuList.classList.toggle('hidden');
            return;
        }

        if(! menuList.classList.contains('hidden')) {
            menuList.classList.add('hidden');
            return;
        }
    });
});

</script>

<template>

    <nav class="bg-third px-4 grid-rows-1 relative flex justify-between items-center md:hidden">

        <h1 class="grid place-items-center uppercase text-3xl font-black italic text-white w-fit h-full">
            crud
        </h1>

        <div>

            <button id="mobile-menu-btn" class="text-white text-3xl">
                <i class="fa-solid fa-bars"></i>
            </button>

            <ul id="mobile-menu-list" class="absolute z-10 right-10 top-[calc(100%+5px)] bg-third w-80 rounded-md shadow-md py-2 hidden">
                <li>
                    <NavLink href="/">
                        <i class="fa-solid fa-gauge text-white"></i>
                        <span>Dashbord</span>
                    </NavLink>
                </li>
                <li>
                    <NavLink href="/organisations">
                        <i class="fa-solid fa-sitemap text-white"></i>
                        <span>Organisations</span>
                    </NavLink>
                </li>
                <li>
                    <NavLink href="/contacts">
                        <i class="fa-solid fa-address-book text-white"></i>
                        <span>Contacts</span>
                    </NavLink>
                </li>
                <li>
                    <NavLink href="/contacts">
                        <i class="fa-solid fa-print text-white"></i>
                        <span>Reports</span>
                    </NavLink>
                </li>
            </ul>
        </div>

    </nav>

</template>
