<template>
    <div class="flex items-center justify-center w-fit px-5 py-1 bg-[#353b44] rounded-full ml-5">
        <Link :href="route('home')">
        <i class="fa-solid fa-arrow-left"></i>
        <span class="ml-2">Back Home</span>
        </Link>
    </div>

    <div class="mt-10 container">
        <h1 class="text-center text-5xl font-bold">My work</h1>
        <div class="mt-5 flex justify-between items-center flex-col space-y-10">
            <ProjectCard v-for="(project, index) in projects" :key="index" :img="project.img" :alt="project.alt"
                :title="project.title" :description="project.description" :githubLink="project.github"
                :opposite="project.opposite" :hasGithub="project.hasGithub" />
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
        github: 'https://github.com/jelatz/Saekyung-Auxilium',
        hasGithub: true
    },
    {
        img: '/images/projects/dashboard.png',
        alt: 'Healteeth',
        title: 'Healteeth',
        description: 'This is a side project',
        github: 'https://github.com/jelatz/healteeth',
        hasGithub: true,
        opposite: true
    },
    {
        img: '/images/projects/enrichment-unlimited.jpg',
        alt: 'Enrichment Unlimited',
        title: 'Enrichment Unlimited',
        description: 'This is my capstone project. A web application that helps the Saekyung Condominium to manage their residents and visitor concerns.',
    },
    {
        img: '/images/projects/integrity-support-services.jpg',
        alt: 'Integrity Support Services',
        title: 'Integrity Support Services',
        description: 'Project created from previous company using wordpress. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.',
        opposite: true
    },
    {
        img: '/images/projects/lyons-global.jpg',
        alt: 'Lyons Global',
        title: 'Lyons Global',
        description: 'Freelance Project lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.',
    },
    {
        img: '/images/projects/nj-leaf.jpg',
        alt: 'NJ Leaf',
        title: 'NJ Leaf',
        description: 'Project created from previous company using wordpress lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.',
        opposite: true
    },
    {
        img: '/images/projects/one-heart-medical-staffing.jpg',
        alt: 'One Heart Medical Staffing',
        title: 'One Heart Medical Staffing',
        description: 'Project created from previous company using wordpress lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.',
    }
])
</script>

<style scoped></style>
