<template>
    <div class="blog-layout">
        <header class="py-4">
            <img :src="Logo" alt="" class="w-80 mx-auto">
            <nav class="mt-4">
                <ul class="flex items-center space-x-10 text-black text-center justify-center">
                    <li>Home</li>
                    <li>About</li>
                    <li>Blogs</li>
                    <li>Contact Me</li>
                </ul>
            </nav>
        </header>
        <!-- Hero Images -->
        <Hero />
        <main>
            <slot />
        </main>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Hero from '@/Components/Hero.vue';
const Logo = ref('/images/logo.jpeg');
</script>

<style scoped>
.blog-layout {
    background-color: white;
    min-height: 100vh;
}
</style>