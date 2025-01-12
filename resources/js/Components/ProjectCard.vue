<template>
    <div class="rounded-lg p-4 w-[60rem] flex justify-between text-left space-x-5">
        <template v-if="opposite">
            <div>
                <h1 class="text-lg text-white font-bold">{{ title }}</h1>
                <p class="text-sm mt-1">{{ description }}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <a :href="githubLink" target="_blank" v-if="hasGithub">
                        <i class="fab fa-github text-2xl text-white"></i>
                    </a>
                </div>
            </div>
            <img :src="img" :alt="alt" class="object-contain w-[30rem] rounded-md">
        </template>
        <template v-else>
            <img :src="img" :alt="alt" class="object-contain w-[30rem] rounded-md">
            <div>
                <h1 class="text-lg text-white font-bold">{{ title }}</h1>
                <p class="text-sm mt-1">{{ description }}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <a :href="githubLink" target="_blank" v-if="hasGithub">
                        <i class="fab fa-github text-2xl text-white"></i>
                    </a>
                </div>
            </div>
        </template>
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
    },
    opposite: {
        type: Boolean,
    },
    hasGithub: {
        type: Boolean
    }
})
</script>

<style scoped></style>