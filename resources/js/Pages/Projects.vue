<template>
    <div class="flex items-center justify-center w-fit px-5 py-1 bg-[#353b44] rounded-full ml-5">
        <Link :href="route('home')">
        <!-- <div class="">
        </div> -->
        <i class="fa-solid fa-arrow-left"></i>
        <span class="ml-2">Back Home</span>
        </Link>
    </div>

    <div class="mt-10 container">
        <h1 class="text-center text-5xl font-bold">My work</h1>
        <div class="mt-5 flex justify-center items-center flex-col">
            <ProjectCard />
            <ProjectCard />
            <ProjectCard />
        </div>
    </div>
</template>

<script setup>
import ProjectCard from '@/Components/ProjectCard.vue';
</script>

<style scoped></style>
