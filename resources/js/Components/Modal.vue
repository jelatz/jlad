<template>
    <div v-if="show" class="fixed inset-0 flex items-center justify-center z-50">
        <!-- Background Overlay -->
        <div class="fixed inset-0 bg-black opacity-50" @click="emit('closeModal')"></div>

        <!-- Modal Content -->
        <div
            class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-[110rem] sm:w-[100rem] max-h-[80vh] overflow-auto">
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
