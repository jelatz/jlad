<template>
    <div class="rounded-lg p-4 w-[60rem] flex justify-left space-x-5">
        <img :src="img" :alt="alt" class="object-contain w-96 rounded-md">
        <div>
            <h1 class="text-lg text-white font-bold">{{ title }}</h1>
            <p class="text-sm mt-1">{{ description }}</p>
        </div>
        <div>
            <a :href="githubLink" target="_blank">
                <i class="fab fa-github text-2xl text-white"></i>
            </a>
        </div>
    </div>
</template>

<script setup>

defineProps({
    img: {
        type: String,
        required: true
    },
    alt: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    },
    githubLink: {
        type: String,
    }
})
</script>

<style scoped></style>