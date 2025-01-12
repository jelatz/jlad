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
        <div class="mt-5 flex justify-between items-center flex-col">
            <ProjectCard v-for="(project, index) in projects" :key="index" :img="project.img" :alt="project.alt"
                :title="project.title" :description="project.description" :githubLink="project.github" />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import ProjectCard from '@/Components/ProjectCard.vue';

const projects = ref([
    {
        img: '/images/projects/index.png',
        alt: 'Saekyung Auxilium',
        title: 'Saekyung Auxilium',
        description: 'This is my capstone project. A web application that helps the Saekyung Condominium to manage their residents and visitor concerns.',
        github: 'https://github.com/jelatz/Saekyung-Auxilium'
    },
    {
        img: '/images/projects/dashboard.png',
        alt: 'Healteeth',
        title: 'Healteeth',
        description: 'This is a side project',
        github: 'https://github.com/jelatz/healteeth'
    },
    {
        img: '/images/projects/enrichment-unlimited.jpg',
        alt: 'Enrichment Unlimited',
        title: 'Enrichment Unlimited',
        description: 'Project created from previous company using wordpress'
    },
    {
        img: '/images/projects/integrity-support-services.jpg',
        alt: 'Integrity Support Services',
        title: 'Integrity Support Services',
        description: 'Project created from previous company using wordpress'
    },
    {
        img: '/images/projects/lyons-global.jpg',
        alt: 'Lyons Global',
        title: 'Lyons Global',
        description: 'Freelance Project'
    },
    {
        img: '/images/projects/nj-leaf.jpg',
        alt: 'NJ Leaf',
        title: 'NJ Leaf',
        description: 'Project created from previous company using wordpress'
    },
    {
        img: '/images/projects/one-heart-medical-staffing.jpg',
        alt: 'One Heart Medical Staffing',
        title: 'One Heart Medical Staffing',
        description: 'Project created from previous company using wordpress'
    }
])
</script>

<style scoped></style>
