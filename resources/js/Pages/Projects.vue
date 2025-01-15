<template>
    <div class="flex items-center justify-center w-fit px-5 py-1 bg-[#353b44] rounded-full ml-5">
        <Link :href="route('home')">
        <i class="fa-solid fa-arrow-left"></i>
        <span class="ml-2">Back Home</span>
        </Link>
    </div>

    <div class="mt-10 container">
        <h1 class="text-center text-7xl font-bold">My work</h1>
        <div class="mt-10 flex justify-between items-center flex-col space-y-28">
            <ProjectCard v-for="(project, index) in projects" :key="index" :img="project.img" :alt="project.alt"
                :title="project.title" :description="project.description" :githubLink="project.github"
                :opposite="project.opposite" :hasGithub="project.hasGithub" :isLive="project.isLive"
                :siteLink="project.siteLink" :stacks="project.stacks" />
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
        description: 'This is my capstone project. It is a web application designed to help Saekyung Condominium manage resident and visitor concerns. The system allows homeowners to easily report issues, and enables the admin to efficiently track and manage these concerns.',
        github: 'https://github.com/jelatz/Saekyung-Auxilium',
        hasGithub: true,
        stacks: ['fa-brands fa-html5', 'fa-brands fa-css3', 'fa-brands fa-js', 'fa-brands fa-php', 'fa-brands fa-bootstrap'],
    },
    {
        img: '/images/projects/dashboard.png',
        alt: 'Healteeth',
        title: 'Healteeth',
        description: 'Healteeth is a web application that helps dental clinics manage their patients and appointments. It allows patients to easily book appointments online, and enables the clinic to efficiently manage their schedules.',
        github: 'https://github.com/jelatz/healteeth',
        hasGithub: true,
        opposite: true,
        stacks: ['fa-brands fa-html5', 'fa-brands fa-css3', 'fa-brands fa-js', 'fa-brands fa-php', 'fa-brands fa-bootstrap'],
    },
    {
        img: '/images/projects/enrichment-unlimited.jpg',
        alt: 'Enrichment Unlimited',
        title: 'Enrichment Unlimited',
        description: 'Enrichment Unlimited is a coaching and consulting company that helps individuals and organizations reach their full potential. This project was created using wordpress.',
        isLive: true,
        siteLink: 'https://integritysupportnd.com',
        stacks: ['fa-brands fa-wordpress', 'fa-brands fa-php']
    },
    {
        img: '/images/projects/integrity-support-services.jpg',
        alt: 'Integrity Support Services',
        title: 'Integrity Support Services',
        description: 'A professional home care agency that provides services to individuals with health care needs and other related services. This project was created using wordpress.',
        opposite: true,
        isLive: true,
        siteLink: 'https://integritysupportnd.com/about/',
        stacks: ['fa-brands fa-wordpress', 'fa-brands fa-php']
    },
    {
        img: '/images/projects/lyons-global.jpg',
        alt: 'Lyons Global',
        title: 'Lyons Global',
        description: 'Lyons Global® is a pioneering international digital health solutions company based in the United States. We provide easy-to-use, adaptable, and accessible products that expand the geographical reach of healthcare delivery. Leveraging cutting-edge robots and digital platforms, we enable seamless access to quality care across borders.',
        isLive: true,
        siteLink: 'https://lyonsglobal.us/',
        stacks: ['fa-brands fa-wordpress', 'fa-brands fa-php']
    },
    {
        img: '/images/projects/nj-leaf.jpg',
        alt: 'NJ Leaf',
        title: 'NJ Leaf',
        description: 'NJ Leaf is a premier cannabis dispensary offering exceptional products and service to both medical patients and recreational customers. Our knowledgeable staff provides compassionate care, personalized guidance, and a curated selection of top-quality cannabis. We prioritize quality, trust, and education to enhance the well-being of our diverse clientele. Woman-owned, minority-owned, and pharmacist-operated, NJ Leaf is dedicated to holistic healing and an exceptional customer experience.',
        opposite: true,
        isLive: true,
        siteLink: 'https://njleaf.com/',
        stacks: ['fa-brands fa-wordpress', 'fa-brands fa-php']
    },
    {
        img: '/images/projects/one-heart-medical-staffing.jpg',
        alt: 'One Heart Medical Staffing',
        title: 'One Heart Medical Staffing',
        description: 'A healthcare staffing agency that provides staffing solutions to healthcare facilities. This project was created using wordpress.',
        isLive: true,
        siteLink: 'http://www.oneheartmedicalstaffing.com/',
        stacks: ['fa-brands fa-wordpress', 'fa-brands fa-php']
    },
])
</script>

<style scoped>
@keyframes slideInLeft {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideInRight {
    0% {
        transform: translateX(100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}

.project-card:nth-child(odd) {
    animation: slideInLeft 1.5s ease-in-out;
}

.project-card:nth-child(even) {
    animation: slideInRight 1.5s ease-in-out;
}

</style>
