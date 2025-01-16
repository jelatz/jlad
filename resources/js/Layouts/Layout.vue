<template>
    <header class="p-10 sticky top-0 w-100">
        <nav class="flex justify-between items-center w-100">
            <div class="contact flex space-x-5">
                <a href="mailto:lanetejlad@gmail.com" class="text-lg">lanetejlad@gmail.com</a>
                <a href="tel:+639760275569" class="text-lg">09760275569</a>
            </div>
            <div class="flex items-center space-x-28 socMed">
                <Link href="/"><i class="fas fa-solid fa-blog text-xl"></i></Link>
                <Link href="projects"><i class="fas fa-solid fa-briefcase text-xl"></i></Link>
                <a href="https://www.linkedin.com/in/jladlanete/"><i class="fas fa-brands fa-linkedin text-xl"></i>
                </a>
                <a href="https://github.com/jelatz?tab=overview&from=2025-01-01&to=2025-01-10" target="_blank"><i
                        class="fas fa-brands fa-github text-xl"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <slot />
    </main>
    <!-- A LEFT ARROW IF CLICKED WILL OPEN A NEW COMPONENT -->
    <!-- <div class="fixed right-3 top-1/2 transform -translate-y-1/2">
        <i class="fa-duotone fa-solid fa-angles-left fa-fade fa-2xl"></i>
    </div> -->
    <footer class="relative bottom-0 w-full py-2 mt-3">
        <p class="text-center">All rights reserved <span class="font-bold">Jlad Lanete 2024 &copy;</span></p>
    </footer>
</template>

<script setup>
import { ref } from 'vue';

const year = ref(new Date().getFullYear());
</script>

<style scoped>
.contact {
    position: relative;
}

.contact a:first-child::after {
    content: "|";
    margin-left: 8px;
    position: absolute;
}

.contact a:hover {
    color: #00adb5;
}

.socMed a:hover {
    transform: scale(1.2);
    color: #00adb5;
}

.socMed a {
    transition: transform 0.8s;
}

.fa-duotone {
    animation: blinkingText 1.5s infinite;
}

@keyframes blinkingText {
    0% {
        opacity: 1;
    }

    50% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
</style>
