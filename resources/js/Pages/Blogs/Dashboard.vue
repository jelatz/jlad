<template>
    <div>
        <div class="p-10 flex items-center justify-evenly w-full space-x-5">
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
                    <tr class="hover:bg-gray-100" v-for="blog in blogs" :key="blog.id">
                        <td class="border px-4 py-1 text-left">
                            {{blog.title}}
                        </td>
                        <td class="border px-4 py-1 text-left">{{blog.content}}</td>
                        <td class="border px-4 py-1 text-left flex space-x-2">
                            <i class="fa-solid fa-eye"></i>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- pagination links -->
             <div></div>
        </div>

        <!-- Add Blog Button -->
        <div class="my-10 mr-11">
            <button class="glass-button ml-auto block" @click="OpenModal">
                Add Blog
            </button>
        </div>

        <!-- Modal -->
        <Modal :show="isOpen" @closeModal="closeModal">
            <h1 class="text-2xl font-bold">Create a New Blog</h1>
            <form @submit.prevent="submitForm">
                <ImageUpload />
                <TextInput forName="title" inputLabel="Title" v-model="form.title" :errorMessage="form.errors.title"
                    type="text" />
                <RichTextEditor forName="content" inputLabel="Content" v-model="form.content"
                    :errorMessage="form.errors.content" />
                <button class="px-3 py-1 rounded-md bg-gray-500 text-white ml-auto block" :disabled="form.processing">
                    Add Blog
                </button>
            </form>
        </Modal>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/Card.vue";
import TextInput from "@/Components/TextInput.vue";
import RichTextEditor from "@/Components/RichTextEditor.vue";
import ImageUpload from "@/Components/ImageUpload.vue";
import Modal from "@/Components/Modal.vue";

defineOptions({ layout: AdminLayout });
defineProps({ blogs: Array });
const form = useForm({
    title: "",
    content: "",
});

const submitForm = () => {
    form.post(route("addBlog"), {
        onError: (errors) => {
            console.log("Form submission errors:", errors);
        },
        onSuccess: () => {
            closeModal();
            form.reset();
        },
    });
};

const isOpen = ref(false); // Modal state

// Open & Close Modal Functions
const OpenModal = () => {
    isOpen.value = true;
};
const closeModal = () => {
    isOpen.value = false;
};

const totalBlogs = ref("Total Blogs");
const totalBlogCount = ref(5);
</script>

<style scoped>
.glass-button {
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    background: rgba(255, 255, 255, 0.1);
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
