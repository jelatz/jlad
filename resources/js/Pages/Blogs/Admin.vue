<template>
    <div class="container mt-10 px-10">

        <!-- Blog Cards -->
        <div class="flex items-center space-x-5 mt-14">
            <BlogCard v-for="(blog, index) in blogs" :key="index" :data="blog" />
        </div>

        <!-- Add Blog Button -->
        <div class="my-10">
            <button class="glass-button ml-auto block" @click="OpenModal">Add Blog</button>
        </div>

        <!-- Modal -->
        <Modal :show="isOpen" @closeModal="closeModal">
            <h1 class="text-2xl font-bold">Create a New Blog</h1>
            <form @submit.prevent="form.post(route('addBlog'))">
                <ImageUpload />
                <TextInput forName="title" inputLabel="Title" v-model="form.title" :errorMessage="form.errors.title"
                    type="text" />
                <RichTextEditor forName="content" inputLabel="Content" v-model="form.content"
                    :errorMessage="form.errors.content" />
                <button class="px-3 py-1 rounded-md bg-gray-500 text-white ml-auto block">Add Blog</button>
            </form>
        </Modal>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import RichTextEditor from '@/Components/RichTextEditor.vue';
import ImageUpload from '@/Components/ImageUpload.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Modal from '@/Components/Modal.vue';
import BlogCard from '@/Components/BlogCard.vue';
import { route } from 'ziggy-js';

defineOptions({ layout: AdminLayout });

const form = useForm({
    title: '',
    content: '',
});

const isOpen = ref(false); // Modal state

// Open & Close Modal Functions
const OpenModal = () => { isOpen.value = true; };
const closeModal = () => { isOpen.value = false; };

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
]);
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