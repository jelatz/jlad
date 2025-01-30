<template>

    <Head title=" | Travel" />
    <Hero :data="heroData" />
    <h1>Travel</h1>
</template>


<script setup>
import BlogLayout from '@/Layouts/BlogLayout.vue';
import Hero from '@/Components/Hero.vue';
import { ref } from 'vue';
defineOptions({ layout: BlogLayout });


const heroData = ref({
    img: '',
    alt: 'hero image',
    innerHeroTitle: 'Welcome to my blog',
    innerHeroDescription: 'A blog about my journey as a software engineer',
    titleStyle: 'text-4xl text-white',
    descriptionStyle: 'text-white',
    heroClass: 'mx-auto w-full h-[35rem] bg-red-800'
})
</script>

<style scoped></style>