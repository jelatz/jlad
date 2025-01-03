<template>
    <header class="p-10 sticky top-0 w-100">
        <nav class="flex justify-between items-center w-100">
            <div class="contact flex space-x-5">
                <a
                    href="mailto:lanetejlad@gmail.com"
                    class="text-lg"
                    >lanetejlad@gmail.com</a
                >
                <a
                    href="tel:+639760275569"
                    class=" text-lg"
                    >09760275569</a
                >
            </div>
            <div class="flex items-center space-x-28 socMed">
                <a href="/"><i class="fas fa-solid fa-blog text-xl"></i></a>
                <a href="/"><i class="fas fa-solid fa-briefcase text-xl"></i></a>
                <a href="/"><i class="fas fa-brands fa-linkedin text-xl"></i></a>
                <a href="/"><i class="fas fa-brands fa-github text-xl"></i></a>
            </div>
        </nav>
    </header>
    <main>
        <slot />
    </main>
</template>

<script setup></script>

<style scoped>
.contact {position: relative;}
.contact a:first-child::after {content: "|";margin-left: 8px;position: absolute;}
.contact a:hover{color: #00adb5;}
.socMed a:hover{transform: scale(1.2);color: #00adb5;}
.socMed a{transition: transform .8s;}

</style>