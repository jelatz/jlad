<template>
    <div class="p-10 flex items-center justify-evenly w-full">
        <Card class="bg-blue-700 text-white" :cardTitle="totalBlogs" :count="totalBlogCount"/>
        <Card class="bg-blue-800 text-white" :cardTitle="totalBlogs" :count="totalBlogCount"/>
        <Card class="bg-blue-950 text-white" :cardTitle="totalBlogs" :count="totalBlogCount"/>
        <Card class="bg-blue-900 text-white" :cardTitle="totalBlogs" :count="totalBlogCount"/>
    </div>
</template>


<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Card from '@/Components/Card.vue';
import { ref } from 'vue';
defineOptions({ layout: AdminLayout });

const totalBlogs = ref('Total Blogs');
const totalBlogCount = ref(5);

</script>

<style scoped>

</style>