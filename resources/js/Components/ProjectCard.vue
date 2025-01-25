<template>
    <div class="rounded-lg p-4 w-[60rem] flex justify-between text-left space-x-5 project-card">
        <template v-if="data.opposite">
            <div>
                <h1 class="text-lg text-white font-bold">{{ data.$title }}</h1>
                <p class="text-sm mt-1">{{ data.description }}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <a :href="data.github" target="_blank" v-if="data.hasGithub">
                        <i class="fab fa-github text-2xl text-[00adb5]"></i>
                    </a>
                    <a :href="data.siteLink" target="_blank" v-if="data.isLive" class="text-[#00adb5]">
                        Visit Website
                    </a>
                </div>
                <div class="flex space-x-3 mt-2">
                    <i v-for="(stack, index) in data.stacks" :key="index" :class="stack"
                        class="text-2xl text-[#00adb5]"></i>
                    <img :src="mysqlImg" alt="mysql" v-if="data.isMysql" class="w-[27px] h-[25px] text-[#00adb5]">
                </div>
            </div>
            <img :src="data.img" :alt="data.alt" class="object-contain w-[30rem] rounded-md">
        </template>
        <template v-else>
            <img :src="data.img" :alt="data.alt" class="object-contain w-[30rem] rounded-md">
            <div>
                <h1 class="text-lg text-white font-bold">{{ data.title }}</h1>
                <p class="text-sm mt-1">{{ data.description }}</p>
                <div class="flex items-center space-x-2 mt-2">
                    <a :href="data.github" target="_blank" v-if="data.hasGithub">
                        <i class="fab fa-github text-2xl text-[#00adb5]"></i>
                    </a>
                    <a :href="data.siteLink" target="_blank" v-if="data.isLive" class="text-[#00adb5]">
                        Visit Website
                    </a>
                </div>
                <div class="flex space-x-3 mt-2 items-center">
                    <i v-for="(stack, index) in data.stacks" :key="index" :class="stack"
                        class="text-2xl text-[#00adb5]"></i>
                    <img :src="mysqlImg" alt="mysql" v-if="data.isMysql" class="w-[30px] h-full text-[#00adb5]">
                </div>
            </div>
        </template>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';


defineProps({
    data: {
        type: Object,
        required: true
    }
})

const mysqlImg = '/images/mysql.svg';
</script>

<style scoped>
.fa-github:hover {
    color: #00adb5;
}
</style>