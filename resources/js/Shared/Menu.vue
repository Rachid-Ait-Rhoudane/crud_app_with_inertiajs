<script setup>

import { onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

onMounted(() => {

    let menuList = document.getElementById("menu-list");

    document.addEventListener('click', (e) => {

        if(e.target.parentNode.id == "menu-btn") {
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

    <button id="menu-btn" class="flex items-center gap-2">
        <span>rachid.aitrhoudane</span>
        <i class="fa-solid fa-chevron-down"></i>
    </button>

    <ul id="menu-list" class="hidden py-2 rounded-md absolute bg-red-500 w-full top-[calc(100%+15px)]">
        <li>
            <Link href="/profile" class="flex items-center gap-2 p-2 hover:bg-secondary">
                <i class="fa-solid fa-user"></i>
                <span>my profile</span>
            </Link>
        </li>
        <li>
            <Link href="/users" class="flex items-center gap-2 p-2 hover:bg-secondary">
                <i class="fa-solid fa-gear"></i>
                <span>manage users</span>
            </Link>
        </li>
        <li>
            <Link href="/logout" class="flex items-center gap-2 p-2 hover:bg-secondary">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>logout</span>
            </Link>
        </li>
    </ul>

</template>
