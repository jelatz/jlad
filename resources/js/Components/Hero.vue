<template>
    <div :class="data.heroClass" class="relative">
        <img :src="data.img" :alt="data.alt">
        <div
            class="absolute left-1/2 top-1/2 md:left-1/4 -translate-x-1/2 -translate-y-1/2 w-full px-2 md:w-fit md:px-0">
            <h2 :class="data.titleStyle">{{ data.innerHeroTitle }}</h2>
            <p :class="data.descriptionStyle">{{ data.innerHeroDescription }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue'

defineProps({
    data: {
        type: Object,
        required: true
    }
})
</script>

<style lang="scss" scoped></style>