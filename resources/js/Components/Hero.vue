<template>
    <div class="w-full h-[30rem] bg-red-900 relative">
        <img :src="data.img" :alt="data.alt" class="w-full">
        <div class="absolute top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2">
            <h2 :class="data.titleStyle">{{ data.innerHeroTitle }}</h2>
            <p :class="data.descriptionStyle">{{ data.innerHeroDescription }}</p>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'

defineProps({
    data: {
        type: Object,
        required: true
    }
})
</script>

<style lang="scss" scoped></style>