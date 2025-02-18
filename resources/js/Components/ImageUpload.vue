<template>
    <div 
        class="relative w-fit mx-auto overflow-hidden rounded-lg transition-all duration-300"
        :class="{ 'bg-black bg-opacity-60': isHovered && imageUrl !== defaultImageUrl }"
        @mouseover="isHovered = true" 
        @mouseleave="isHovered = false"
    >
        <!-- File Input (Hidden) -->
        <label class="absolute inset-0 cursor-pointer">
            <input 
                type="file" 
                @change="onFileChange" 
                class="hidden" 
            />
        </label>

        <!-- Image Display -->
        <img 
            :src="imageUrl" 
            alt="Uploaded Image" 
            class="border w-96 rounded-lg transition-opacity duration-300" 
        />

        <!-- Overlay with Upload Text -->
        <div 
            class="absolute inset-0 flex justify-center items-center transition-opacity duration-300 pointer-events-none"
            :class="{
                'opacity-100': imageUrl === defaultImageUrl || isHovered, 
                'opacity-0': imageUrl !== defaultImageUrl && !isHovered
            }"
        >
            <span class="text-white bg-black bg-opacity-50 px-4 py-2 rounded-md">Upload Image</span>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const emit = defineEmits(['input']);

const defaultImageUrl = '/images/img.jpeg'; 
const imageUrl = ref(defaultImageUrl);
const isHovered = ref(false);

const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imageUrl.value = e.target.result;
            emit('input', file); // Emit the selected file to the parent
        };
        reader.readAsDataURL(file);
    }
};

</script>
