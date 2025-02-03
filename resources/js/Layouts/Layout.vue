<template>
    <header class="md:p-10 p-2 sticky top-0 w-full text-white">
        <nav class="flex flex-col md:flex-row justify-between items-center w-full">
            <div class="contact flex-col justify-center md:flex-row space-x-5">
                <a href="mailto:lanetejlad@gmail.com" class="md:text-lg text-sm">lanetejlad@gmail.com</a>
                <a href="tel:+639760275569" class="md:text-lg text-sm">09760275569</a>
            </div>
            <div class="flex items-center md:space-x-20 space-x-10 mt-6 md:mt-0 socMed">
                <Link :href="route('blogs')"><i class="fas fa-solid fa-blog text-xl"></i></Link>
                <Link :href="route('projects')"><i class="fas fa-solid fa-briefcase text-xl"></i></Link> <a
                    href="https://www.linkedin.com/in/jladlanete/" target="_blank"><i
                        class="fas fa-brands fa-linkedin text-xl"></i>
                </a>
                <a href="https://github.com/jelatz?tab=overview&from=2025-01-01&to=2025-01-10" target="_blank"><i
                        class="fas fa-brands fa-github text-xl"></i></a>
            </div>
        </nav>
    </header>
    <main class="w-full min-h-full">
        <slot />
    </main>
    <!-- A LEFT ARROW IF CLICKED WILL OPEN A NEW COMPONENT -->
    <!-- <div class="fixed right-3 top-1/2 transform -translate-y-1/2">
        <i class="fa-duotone fa-solid fa-angles-left fa-fade fa-2xl"></i>
    </div> -->
    <footer class="w-full absolute bottom-0 py-2 mt-32 text-white">
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
