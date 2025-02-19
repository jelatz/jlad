<template>
    <div :class="['rounded-lg relative p-3 w-full space-x-5 h-24', cardClass]">
        <h5>{{ cardTitle }}</h5>
        <p class="absolute right-3 top-16">{{ count }}</p>
    </div>
</template>


<script setup>
import { ref } from 'vue';

defineProps({
    cardClass: String,
    cardTitle: String,
    count: Number
})
</script>

<style scoped>

</style>