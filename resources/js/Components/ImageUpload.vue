<template>
    <div class="relative w-fit mx-auto">
        <input type="file" @change="onFileChange" class="absolute inset-0 opacity-0 cursor-pointer w-full" />
        <img :src="imageUrl" alt="Image preview" class="border w-fit" />
        <div class="overlay-text">Upload Image</div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const defaultImageUrl = '/images/img.jpeg'; // Set your default image path here
const imageUrl = ref(defaultImageUrl);

const onFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imageUrl.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};
</script>

<style scoped>
.relative {
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
}

.absolute {
    position: absolute;
}

.overlay-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    background-color: rgba(0, 0, 0, 0.4);
    padding: 10px;
    border-radius: 5px;
    pointer-events: none;
}

.overlay-text:hover {
    background-color: rgba(0, 0, 0, 0.6);
}
</style>