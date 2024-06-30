<script setup>

</script>

<template>

    <div class="overflow-x-auto mt-6">

        <table class="min-w-[800px] w-full bg-white shadow-md">

            <thead class="border-b border-b-gray-200 text-base md:text-2xl capitalize text-white bg-main">
                <tr>
                    <slot name="head"></slot>
                </tr>
            </thead>

            <tbody>
                <slot></slot>
            </tbody>

        </table>

    </div>

</template>
