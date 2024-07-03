<script setup>

import { onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';

onMounted(() => {

    let menuList = document.getElementById("menu-list");
    let btnArrow = document.querySelector("#menu-btn i");

    document.addEventListener('click', (e) => {

        if(e.target.id == "menu-btn" || e.target.parentNode.id == "menu-btn") {

            menuList.classList.toggle('hidden');
            btnArrow.classList.toggle('-rotate-90');
            return;
        }

        if(! menuList.classList.contains('hidden')) {
            menuList.classList.add('hidden');
            btnArrow.classList.remove('-rotate-90');
            return;
        }
    });
});

</script>


<template>

    <button id="menu-btn" class="flex items-center gap-2 hover:text-secondary">
        <span class="text-sm sm:text-base min-w-32">{{ $page.props.auth.user.name }}</span>
        <i class="fa-solid fa-chevron-down duration-300"></i>
    </button>

    <ul id="menu-list" class="hidden py-2 absolute w-full top-[calc(100%+15px)] z-50 bg-white border border-gray-200 rounded-md shadow-md">
        <li>
            <Link href="/profile" class="flex items-center gap-2 p-2 hover:bg-secondary hover:text-white capitalize">
                <i class="fa-solid fa-user"></i>
                <span>my profile</span>
            </Link>
        </li>
        <li>
            <Link href="/users" class="flex items-center gap-2 p-2 hover:bg-secondary hover:text-white capitalize">
                <i class="fa-solid fa-gear"></i>
                <span>manage users</span>
            </Link>
        </li>
        <li>
            <Link href="/logout" method="delete" as="button" class="flex items-center gap-2 p-2 w-full hover:bg-secondary hover:text-white capitalize">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>logout</span>
            </Link>
        </li>
    </ul>

</template>
