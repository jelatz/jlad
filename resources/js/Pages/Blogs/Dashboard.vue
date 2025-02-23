<template>
    <div>
        <div class="p-10 flex items-center justify-evenly w-full space-x-5">
            <Card class="bg-blue-700 text-white" cardTitle="Total Blogs" :count="blogs.total" />
            <Card class="bg-blue-800 text-white" cardTitle="Featured Blogs" :count="featuredBlogs" />
            <Card class="bg-blue-950 text-white" cardTitle="Active blogs" :count="activeBlogs" />
            <Card class="bg-blue-900 text-white" cardTitle="Inactive Blogs" :count="inactiveBlogs" />
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
                    <tr class="hover:bg-gray-100" v-for="blog in blogs.data" :key="blog.id">
                        <td class="border px-4 py-1 text-left">
                            {{ blog.title }}
                        </td>
                        <td class="border px-4 py-1 text-left">
                            {{ blog.content }}
                        </td>
                        <td class="border px-4 py-1 text-left flex space-x-2">
                            <button @click="openModal('view', blog)">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button @click="openModal('edit', blog)">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- pagination links -->
            <div class="mt-2 flex justify-between items-center">
                <p class="text-skate-600 text-sm">
                    Showing {{ blogs.from }} to {{ blogs.to }} of
                    {{ blogs.total }}
                </p>
                <div>
                    <Link v-for="link in blogs.links" :key="link.label" v-html="link.label" :href="link.url ?? '#'"
                        class="mx-1 px-1" :class="{
                            'text-slate-300': !link.url,
                            'text-blue-500': link.active,
}">
                    </Link>
                </div>
            </div>
        </div>

        <!-- Add Blog Button -->
        <div class="my-10 mr-11">
            <button class="glass-button ml-auto block" @click="OpenModal">
                Add Blog
            </button>
        </div>

        <!-- Add Blog Modal -->
        <Modal :show="isModalOpen" :title="modalTitle" :actionButton="modalActionButton"
            @closeModal="isModalOpen = false">

            <!-- View Blog -->
            <template v-if="modalType === 'view'">
                <img :src="selectedBlog?.image ? '/storage/' + selectedBlog.image : defaultImage" alt="Blog Image"
                    class="mx-auto w-full h-40 mb-4">
                <h1 class="text-xl font-bold mb-2">{{ selectedBlog.title }}</h1>
                <p>{{ selectedBlog.content }}</p>
            </template>

            <!-- Edit Blog -->
            <template v-if="modalType === 'edit'">
                <form @submit.prevent="submitForm">
                    <ImageUpload v-model="form.image" />
                    <TextInput forName="title" type="string" inputLabel="Title" v-model="selectedBlog.title" />
                    <RichTextEditor forName="content" inputLabel="Content" v-model="selectedBlog.content" />
                    <button class="px-3 py-1 mt-4 bg-blue-500 text-white rounded-md">Save Changes</button>
                </form>
            </template>

        </Modal>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from "vue";
import { useForm } from "@inertiajs/vue3";

import AdminLayout from "@/Layouts/AdminLayout.vue";
import Card from "@/Components/Card.vue";
import TextInput from "@/Components/TextInput.vue";
import RichTextEditor from "@/Components/RichTextEditor.vue";
import ImageUpload from "@/Components/ImageUpload.vue";
import Modal from "@/Components/Modal.vue";

defineOptions({ layout: AdminLayout });
const props = defineProps({
    blogs: Object,
    featuredBlogs: Number,
    activeBlogs: Number,
    inactiveBlogs: Number,
});


const defaultImage = "/images/img.jpeg";
const isModalOpen = ref(false);
const modalType = ref("");
const selectedBlog = ref(null);


const form = useForm({
    title: "",
    content: "",
    image: null,
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

const openModal = (type, blog) => {
    modalType.value = type;
    selectedBlog.value = blog;
    isModalOpen.value = true;

    if (type === "edit" && blog) {
        form.title = blog.title || "";
        form.content = blog.content || "";

        // Pass existing image URL if available
        form.image = blog.image ? `/storage/${blog.image}` : null;
    }
};




// Computed properties for modal title and action button
const modalTitle = computed(() => {
    return modalType.value === "view"
        ? "View Blog"
        : modalType.value === "edit"
            ? "Edit Blog"
            : "Delete Blog";
});


const modalActionButton = computed(() => {
    if (modalType.value === "delete") {
        return {
            text: "Delete",
            class: "px-3 py-1 bg-red-500 text-white rounded-md",
            action: () => {
                console.log("Deleting blog:", selectedBlog.value.id);
                isModalOpen.value = false;
            },
        };
    }
    return null;
});
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
