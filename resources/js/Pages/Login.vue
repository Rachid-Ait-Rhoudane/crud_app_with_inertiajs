<script setup>

let submit = () => {
    console.log('form submited');
}

</script>


<template>

    <div class="w-screen h-screen bg-main grid place-items-center">

        <div class="bg-white rounded-md space-y-10 w-[90%] sm:w-[450px]">

            <div class="space-y-4 mt-6">
                <h1 class="w-fit mx-auto text-3xl font-bold text-gray-700 capitalize">welcome back</h1>
                <hr class="h-0.5 w-1/4 bg-gray-200 rounded-md mx-auto">
            </div>

            <form @submit.prevent="submit" class="flex flex-col gap-6">

                <div class="flex flex-col gap-1 px-6">
                    <label class="capitalize text-main font-bold" for="email">email:</label>
                    <input class="h-10 w-full rounded-md focus:outline-none border border-gray-200 px-2" type="email" name="email" id="email" placeholder="example@gmail.com" />
                </div>

                <div class="flex flex-col gap-1 px-6">
                    <label class="capitalize text-main font-bold" for="password">password:</label>
                    <input class="h-10 w-full rounded-md focus:outline-none border border-gray-200 px-2" type="password" name="password" id="password" placeholder="**********">
                </div>

                <div class="px-6 flex items-center gap-1">
                    <input class="h-8 cursor-pointer" type="checkbox" name="remember" id="remember" placeholder="**********">
                    <label class="cursor-pointer" for="remember">Remember me</label>
                </div>

                <div class="bg-gray-200 rounded-b-md py-6 flex flex-row-reverse pr-6">
                    <button type="submit">Login</button>
                </div>

            </form>

        </div>

    </div>

</template>
