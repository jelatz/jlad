<template>
    <div class="container">
        <Newsletter />
    </div>
</template>


<script setup>
import BlogLayout from '@/Layouts/BlogLayout.vue';
import Newsletter from '@/Components/Newsletter.vue'

defineOptions({ layout: BlogLayout });
</script>

<style lang="scss" scoped></style>