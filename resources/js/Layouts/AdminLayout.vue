<template>
    <div class="admin-layout flex">
        <SideNav :class="sideNavClasses" />
        <main class="w-full">
            <div class="py-3 px-5 shadow-md">
                <button @click="toggleSideNav">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <slot />
        </main>
        <!-- <footer class="w-full absolute bottom-0 py-2 mt-32 ">
            <p class="text-center">All rights reserved <span class="font-bold">Jlad Lanete 2024 &copy;</span></p>
        </footer> -->
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import SideNav from '@/Components/SideNav.vue';

const isSideNavOpen = ref(true);

const toggleSideNav = () => {
    isSideNavOpen.value = !isSideNavOpen.value;
};

const sideNavClasses = computed(() => {
    return isSideNavOpen.value ? 'side-nav w-64' : 'side-nav w-[0]';
});
</script>

<style scoped>
.admin-layout {
    background-color: white;
    min-height: 100vh;
}
.side-nav {
    transition: width 0.6s ease;
}
</style>