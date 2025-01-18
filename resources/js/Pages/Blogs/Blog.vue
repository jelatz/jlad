<template>

    <Head title=" | Blog" />
    <!-- container -->
    <div class="text-black py-2 w-11/12 mx-auto">
        <h1 class="mb-3 text-md">Recent Posts</h1>
        <BlogCard v-for="(blog, index) in blogs" :key="index" :data="blog" />
    </div>
</template>

<script setup>
import { ref } from 'vue';
import BlogLayout from '@/Layouts/BlogLayout.vue';
import BlogCard from '@/Components/BlogCard.vue';
defineOptions({ layout: BlogLayout });

const blogs = ref([
    {
        title: 'How to create a blog using Laravel and Vue 3',
        img: '',
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Aug 20, 2021'
    }
])
</script>

<style lang="scss" scoped></style>
