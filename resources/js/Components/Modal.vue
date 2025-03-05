<template>
    <div v-if="show" class="fixed inset-0 flex items-center justify-center z-50" @keydown.esc="closeModal" tabindex="0">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-black opacity-50" @click="closeModal"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl transform transition-all w-[95%] h-[95%] overflow-auto relative">
            <!-- Close Button -->
            <button @click="closeModal" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <!-- Modal Header -->
            <div class="px-6 py-4 border-b">
                <h2 class="text-xl font-bold">{{ title }}</h2>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-4 w-[80%] block mx-auto">
                <slot></slot> <!-- Injected content from parent -->
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t flex justify-end space-x-2">
                <button @click="closeModal" class="px-3 py-1 bg-gray-500 text-white rounded-md">Close</button>
                <button v-if="actionButton" @click="actionButton.action" :class="actionButton.class">
                    {{ actionButton.text }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits, onMounted, onBeforeUnmount } from "vue";

const props = defineProps({
    show: Boolean,
    title: String,
    actionButton: Object,
});

const emit = defineEmits(["closeModal"]);

const closeModal = () => {
    emit("closeModal");
};

const handleKeydown = (event) => {
    if (event.key === "Escape") {
        closeModal();
    }
};

onMounted(() => {
    window.addEventListener("keydown", handleKeydown);
});

onBeforeUnmount(() => {
    window.removeEventListener("keydown", handleKeydown);
});
</script>

