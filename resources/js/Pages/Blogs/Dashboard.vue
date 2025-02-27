<template>
    <div>
        <div class="p-10 flex items-center justify-evenly w-full space-x-5">
            <Card class="bg-blue-700 text-white" cardTitle="Total Blogs" :count="blogs.total" />
            <Card class="bg-blue-800 text-white" cardTitle="Featured Blogs" :count="featuredBlogs" />
            <Card class="bg-blue-950 text-white" cardTitle="Active blogs" :count="activeBlogs" />
            <Card class="bg-blue-900 text-white" cardTitle="Inactive Blogs" :count="inactiveBlogs" />
        </div>

        <div class="p-10">
            <button @click="deleteSelectedBlogs" :disabled="selectedBlogs.length === 0"
                class="bg-red-500 text-white px-3 py-2 rounded disabled:opacity-50 block ml-auto mb-3">
                Delete Selected
            </button>
            <table class="border min-w-full border-gray-300 border-collapse shadow-lg rounded-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">
                            <input type="checkbox" @change="toggleSelectAll" v-model="selectAll" />
                        </th>
                        <th class="border px-4 py-1 text-left">Title</th>
                        <th class="border px-4 py-1 text-left">Category</th>
                        <th class="border px-4 py-1 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100" v-for="blog in blogs.data" :key="blog.id">
                        <td class="border p-2 text-center">
                            <input type="checkbox" :value="blog.id" v-model="selectedBlogs"
                                @change="checkIfAllSelected" />
                        </td>
                        <td class="border px-4 py-1 text-left w-fit">
                            <p class="text-sm truncate">
                                {{ blog.title }}
                            </p>
                        </td>
                        <td class="border px-4 py-1 text-left">
                            <p class="line-clamp-1 w-full text-sm">
                                {{ blog.content }}
                            </p>
                        </td>
                        <td class="border px-4 py-1 text-left flex space-x-2 items-center">
                            <button @click="openModal('view', blog)">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button @click="openModal('edit', blog)">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button @click="deleteBlog(blog)">
                                <i class="fa-solid fa-trash"></i>
                            </button>
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
            <button class="glass-button ml-auto block" @click="openModal('create', '')">
                Add Blog
            </button>
        </div>

        <!-- Add Blog Modal -->
        <Modal :show="isModalOpen" :title="modalTitle" @closeModal="isModalOpen = false">

            <!-- Create Blog -->
            <template v-if="modalType === 'create'">
                <h1 class="text-2xl font-bold">Create a New Blog</h1>
                <form @submit.prevent="submitForm">
                    <ImageUpload v-model="form.image" />
                    <TextInput forName="title" type="text" inputLabel="Title" v-model="form.title" />
                    <RichTextEditor forName="content" inputLabel="Content" v-model="form.content" />
                    <button class="px-3 py-1 rounded-md bg-gray-500 text-white ml-auto block"
                        :disabled="form.processing">Add Blog</button>
                </form>
            </template>
            <!-- View Blog -->
            <template v-if="modalType === 'view'">
                <img :src="selectedBlog?.image ? ('/storage/' + selectedBlog.image) : defaultImage" alt="Blog Image"
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
import Swal from 'sweetalert2';
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
const selectedBlogs = ref([]);
const selectAll = ref(false);




const form = useForm({
    title: "",
    content: "",
    image: null,
});


const closeModal = isModalOpen.value = false;

const submitForm = () => {
    form.post(route("addBlog"), {
        onError: (errors) => {
            console.log("Form submission errors:", errors);
        },
        onSuccess: () => {
            Swal.fire({
                title: "Success",
                text: "Blog added successfully",
                icon: "success",
                confirmButtonText: "Ok",
            }).then((result) => {
                if (result.isConfirmed) {
                    isModalOpen.value = false;
                    form.reset();
                }
            })
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

        // Ensure the correct image format is used
        form.image = blog.image ? `/storage/${blog.image}` : null;
    } else if (type === "create") {
        form.reset(); // Reset form for new blog
    }
};

// Computed properties for modal title and action button
const modalTitle = computed(() => {
    return modalType.value === "view"
        ? "View Blog"
        : modalType.value === "edit"
            ? "Edit Blog"
            : modalType.value === "create"
                ? "Create Blog"
                : "Delete Blog";
});


const deleteBlog = (blog) => {
    Swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.delete(route("deleteBlog", blog.id), {
                onSuccess: () => {
                    Swal.fire("Deleted!", "The blog has been deleted.", "success");
                    isModalOpen.value = false;
                },
                onError: (errors) => {
                    console.error("Error deleting blog:", errors);
                    Swal.fire("Error", "Failed to delete the blog.", "error");
                },
            });
        }
    });
};


const toggleSelectAll = () => {
    if (selectAll.value == true) {
        selectedBlogs.value = props.blogs.data.map(blog => blog.id); // Select all
    } else {
        selectedBlogs.value = []; // Unselect all
    }
};

const checkIfAllSelected = () => {
    selectAll.value = selectedBlogs.value.length === props.blogs.data.length;
};

const deleteSelectedBlogs = () => {
    Swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.post(route("blog.bulkDelete"), {
                ids: selectedBlog.value, // Pass selected IDs
            }, {
                onSuccess: () => {
                    Swal.fire("Deleted!", "Selected blogs have been deleted.", "success");
                    selectedBlog.value = []; // Clear selection
                    selectAll.value = false; // Reset checkbox
                },
                onError: (errors) => {
                    console.error("Error deleting blogs:", errors);
                    Swal.fire("Error", "Failed to delete selected blogs.", "error");
                }
            });
        }
    });
};

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
