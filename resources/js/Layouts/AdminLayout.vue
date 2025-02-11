<template>
    <div class="admin-layout flex">
        <SideNav />
        <main>
            <slot />
        </main>
        <!-- <footer class="w-full absolute bottom-0 py-2 mt-32 ">
            <p class="text-center">All rights reserved <span class="font-bold">Jlad Lanete 2024 &copy;</span></p>
        </footer> -->
    </div>
</template>

<script setup>
import SideNav from '@/Components/SideNav.vue';
</script>

<style scoped>
.admin-layout {
    background-color: white;
    min-height: 100vh;
}
</style>