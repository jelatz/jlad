<template>
    <div class="blog-layout">
        <header class="py-4">
            <img :src="Logo" alt="" class="w-1/6 mx-auto" />
            <nav class="mt-8">
                <ul class="flex items-center space-x-10 text-black text-center justify-center">
                    <li>
                        <Link :href="route('blog')">Home </Link>
                    </li>
                    <li>
                        <Link :href="route('about')">About Me</Link>
                    </li>
                    <li class="relative">
                        <button @click.stop="showDropdown">Blogs</button>
                        <DropdownMenu v-if="isDropdownVisible" />
                    </li>
                    <li>
                        <Link :href="route('contact-me')"> Contact Me </Link>
                    </li>
                    <li>
                        <Link :href="route('newsletter')"> Newsletter </Link>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- Hero Images -->
        <!-- <Hero /> -->
        <main>
            <slot />
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
// import Hero from "@/Components/Hero.vue";
import DropdownMenu from "@/Components/DropdownMenu.vue";
const Logo = ref("/images/logo.jpeg");

const isDropdownVisible = ref(false);

const showDropdown = () => {
    isDropdownVisible.value = !isDropdownVisible.value;
};

const handleClickOutside = (event) => {
    if (isDropdownVisible.value) {
        isDropdownVisible.value = false;
    }
};

onMounted(() => {
    $(document).on("click", handleClickOutside);
});
onBeforeUnmount(() => {
    $(document).off("click", handleClickOutside);
});
</script>

<style scoped>
.blog-layout {
    background-color: white;
    min-height: 100vh;
}
</style>
