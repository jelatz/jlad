<template>
    <div>
        <div class="p-10 flex items-center justify-evenly w-full">
            <Card class="bg-blue-700 text-white" :cardTitle="totalBlogs" :count="totalBlogCount" />
            <Card class="bg-blue-800 text-white" :cardTitle="totalBlogs" :count="totalBlogCount" />
            <Card class="bg-blue-950 text-white" :cardTitle="totalBlogs" :count="totalBlogCount" />
            <Card class="bg-blue-900 text-white" :cardTitle="totalBlogs" :count="totalBlogCount" />
        </div>

        <div class="p-10">
            <table class="border min-w-full border-gray-300 border-collapse shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-1 text-left">Title</th>
                        <th class="border px-4 py-1 text-left">Category</th>
                        <th class="border px-4 py-1 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-1 text-left">Emilias First Trip</td>
                        <td class="border px-4 py-1 text-left">Travel</td>
                        <td class="border px-4 py-1 text-left flex space-x-2">
                            <i class="fa-solid fa-eye"></i>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/Card.vue";
import { ref } from "vue";
defineOptions({ layout: AdminLayout });

const totalBlogs = ref("Total Blogs");
const totalBlogCount = ref(5);
</script>

<style scoped>

</style>
