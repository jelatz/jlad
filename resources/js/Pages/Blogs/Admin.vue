<template>
    <div class="container mt-10">
        <ul class="flex justify-center items-center space-x-5">
            <li>
                <button class="glass-button">Lifestyle</button>
            </li>
            <li>
                <button class="glass-button">Travel</button>
            </li>
        </ul>

        <div class="flex items-center space-x-5 mt-14">
            <BlogCard v-for="(blog, index) in blogs" :key="index" :data="blog" />
        </div>

        <div class="my-10">
            <button class="glass-button ml-auto block">Add Blog</button>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import BlogCard from '../../Components/BlogCard.vue';
defineOptions({ layout: AdminLayout });

const blogs = ref([
    {
        title: 'How to create a blog using Laravel and Vue 3',
        img: '',
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Aug 20, 2021'
    },
    {
        title: "Life on life's terms. What does it mean?",
        img: "",
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Sept 20 2024'
    }
])

</script>

<style scoped>
.glass-button {
    padding: 0.20rem 1.5rem;
    border-radius: 0.5rem;
    background: rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: black;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: background 0.3s, box-shadow 0.3s;
    width: 8rem;
    text-align: center;
}

.glass-button:hover {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
}
</style>