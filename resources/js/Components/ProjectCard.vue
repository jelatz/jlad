<template>
    <div class="border-2 border-gray-200 rounded-lg p-4 w-[50rem] flex justify-left space-x-3">
        <img :src="saekyungAux" alt="">
        <p class="text-sm text-gray-500">Project Description</p>
        <p class="text-sm text-gray-500">Project Description</p>
        <p class="text-sm text-gray-500">Project Description</p>
        <p class="text-sm text-gray-500">Project Description</p>
        <p class="text-sm text-gray-500">Project Description</p>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const saekyungAux = ref('/images/projects/index.png');
</script>

<style scoped></style>