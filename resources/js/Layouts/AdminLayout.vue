<template>
    <div class="admin-layout">
        <h1 class="text-center pt-5 text-3xl">God, Grant me the serenity to accept the things I cannot change, the
            courage to change
            the things I can and the wisdom to know the difference.</h1>
        <main>
            <slot />
        </main>
        <footer class="w-full absolute bottom-0 py-2 mt-32 ">
            <p class="text-center">All rights reserved <span class="font-bold">Jlad Lanete 2024 &copy;</span></p>
        </footer>
    </div>
</template>

<script setup>

</script>

<style scoped>
.admin-layout {
    background-color: white;
    min-height: 100vh;
}
</style>