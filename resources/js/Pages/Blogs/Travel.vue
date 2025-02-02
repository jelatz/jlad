<template>

    <Head :title="`| ${$page.component}`" />
    <Hero :data="heroData" />

    <div class="pt-10">
        <div class="container flex justify-start items-center space-x-5">
            <BlogCard v-for="(blog, index) in blogs" :key="index" :data="blog" />
        </div>
    </div>
</template>


<script setup>
import BlogLayout from '@/Layouts/BlogLayout.vue';
import Hero from '@/Components/Hero.vue';
import BlogCard from '@/Components/BlogCard.vue';
import { ref } from 'vue';
defineOptions({ layout: BlogLayout });

const blogs = ref([
    {
        img: '',
        alt: 'blog image',
        date: 'June 12, 2021',
        author: 'John Doe',
        title: 'How to live a healthy lifestyle'

    },
    {
        img: '',
        alt: 'blog image',
        date: 'June 12, 2021',
        author: 'John Doe',
        title: 'How to live a healthy lifestyle'

    },
    {
        img: '',
        alt: 'blog image',
        date: 'June 12, 2021',
        author: 'John Doe',
        title: 'How to live a healthy lifestyle'
    }
])
const heroData = ref({
    img: '',
    alt: 'hero image',
    innerHeroTitle: 'Title for the travel blog',
    innerHeroDescription: 'Description for the travel blog',
    titleStyle: 'text-4xl text-white',
    descriptionStyle: 'text-white',
    heroClass: 'mx-auto w-full h-[35rem] bg-red-800'
})
</script>

<style scoped></style>