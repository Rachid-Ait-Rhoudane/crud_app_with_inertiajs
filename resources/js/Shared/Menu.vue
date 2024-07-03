<script setup>

import { onMounted } from 'vue';
import MenuLink from './MenuLink.vue';

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
        <img class="block w-8 aspect-square rounded-full" :src="'http://127.0.0.1:8000'+$page.props.auth.user.avatar" alt="user avatar">
        <span class="text-sm sm:text-base min-w-32">{{ $page.props.auth.user.name }}</span>
        <i class="fa-solid fa-chevron-down duration-300"></i>
    </button>

    <ul id="menu-list" class="hidden py-2 absolute w-full top-[calc(100%+15px)] z-50 bg-white border border-gray-200 rounded-md shadow-md">
        <li>
            <MenuLink :href="'/users/edit/'+$page.props.auth.user.id" :active="$page.component == 'Profile'">
                <i class="fa-solid fa-user"></i>
                <span>my profile</span>
            </MenuLink>
        </li>
        <li>
            <MenuLink href="/users">
                <i class="fa-solid fa-gear"></i>
                <span>manage users</span>
            </MenuLink>
        </li>
        <li>
            <MenuLink href="/logout" method="delete" as="button" class="w-full">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>logout</span>
            </MenuLink>
        </li>
    </ul>

</template>
