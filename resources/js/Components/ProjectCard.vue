<template>
    <div class="rounded-lg p-4 w-[60rem] flex justify-between text-left space-x-5 project-card">
        <template v-if="opposite">
            <div>
                <h1 class="text-lg text-white font-bold">{{ title }}</h1>
                <p class="text-sm mt-1">{{ description }}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <a :href="githubLink" target="_blank" v-if="hasGithub">
                        <i class="fab fa-github text-2xl text-white"></i>
                    </a>
                    <a :href="siteLink" target="_blank" v-if="isLive" class="text-[#00adb5]">
                        Visit Website
                    </a>
                </div>
                <div class="flex space-x-3 mt-2">
                    <i v-for="(stack, index) in stacks" :key="index" :class="stack" class="text-2xl text-[#00adb5]"></i>
                    <img :src="mysqlImg" alt="mysql" v-if="ifMysql" class="w-[27px] h-[25px] text-[#00adb5]">
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
                    <a :href="siteLink" target="_blank" v-if="isLive" class="text-[#00adb5]">
                        Visit Website
                    </a>
                </div>
                <div class="flex space-x-3 mt-2 items-center">
                    <i v-for="(stack, index) in stacks" :key="index" :class="stack" class="text-2xl text-[#00adb5]"></i>
                    <img :src="mysqlImg" alt="mysql" v-if="ifMysql" class="w-[27px] h-[25px] text-[#00adb5]">
                </div>
            </div>
        </template>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

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
    },
    isLive: {
        type: Boolean
    },
    siteLink: {
        type: String
    },
    stacks: {
        type: Array
    },
    ifMysql: {
        type: Boolean
    },
    mysqlImg: {
        type: String,
        required: true
    }
});
</script>

<style scoped>
.fa-github:hover {
    color: #00adb5;
}
</style>