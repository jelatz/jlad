<template>
    <div v-if="show" class="fixed inset-0 flex items-center justify-center z-50">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-black opacity-50" @click="emit('closeModal')"></div>

        <!-- Modal Content -->
        <div
            class="bg-white rounded-lg shadow-xl transform transition-all w-[100rem] h-fit max-h-[50rem] overflow-auto relative">
            <!-- Close Button -->
            <button @click="emit('closeModal')"
                class="sticky block top-3 mr-2 ml-auto text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="px-4 py-5 sm:p-6">
                <slot></slot> <!-- Injected content from parent -->
            </div>
            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button @click="emit('closeModal')"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    show: Boolean, // Control visibility
});

const emit = defineEmits(["closeModal"]); // Emit close event
</script>

<style scoped></style>
