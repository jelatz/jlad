<template>
    <div class="blog-layout" @click="handleClickOutside">
        <header class="py-4 flex justify-between items-center px-5 md:flex-col">
            <Link :href="route('blogs.index')" class="logo"><img :src="Logo" :alt="alt"
                class="w-1/6 md:w-52 md:mx-auto" />
            </Link>
            <button class="hamburger md:hidden" @click.stop="toggleMobileNav">
                <i class="fa fa-bars"></i>
            </button>
            <nav class="mt-8 hidden md:block">
                <ul class="items-center space-x-10 text-black text-center justify-center hidden md:flex">
                    <li>
                        <Link :href="route('blogs.index')">Home </Link>
                    </li>
                    <li>
                        <Link :href="route('about')">About Me</Link>
                    </li>
                    <li class="relative" @mouseenter="showDropdown" @mouseleave="hideDropdown">
                        <button class="blog-button">
                            Blogs
                        </button>
                        <div class="absolute left-1/2 -translate-x-1/2 rounded-md border border-black shadow-lg w-36 bg-slate-200 z-50"
                            v-if="isDropdownVisible" @mouseenter="showDropdown" @mouseleave="hideDropdown">
                            <ul class="flex flex-col items-stretch justify-stretch w-full">
                                <li>
                                    <Link :href="route('lifestyle')" class="block w-full">
                                    Lifestyle
                                    </Link>
                                </li>
                                <li>
                                    <Link :href="route('travel')" class="block w-full">
                                    Travel
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <Link :href="route('home')"> Contact Me </Link>
                    </li>
                    <li>
                        <Link :href="route('newsletter')"> Newsletter </Link>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Mobile view -->
        <nav v-if="isMobileNavVisible" class="mobile-nav md:hidden absolute w-full bg-slate-200 z-50">
            <ul class="flex items-stretch flex-col text-black text-center justify-stretch">
                <li>
                    <Link :href="route('blogs.index')" class="w-full block" @click="toggleMobileNav">Home </Link>
                </li>
                <li>
                    <Link :href="route('about')" @click="toggleMobileNav">About Me</Link>
                </li>
                <li class="relative" @click="toggleMobileDropdown">
                    <button class="blog-button">
                        Blogs
                    </button>
                    <div class="block rounded-md shadow-lg w-full bg-slate-100 z-50" v-if="isMobileDropdownVisible">
                        <ul class="flex flex-col items-stretch justify-stretch">
                            <li>
                                <Link :href="route('lifestyle')" class="block w-full" @click="toggleMobileNav">
                                Lifestyle
                                </Link>
                            </li>
                            <li>
                                <Link :href="route('travel')" class="block w-full" @click="toggleMobileNav">
                                Travel
                                </Link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <Link :href="route('home')" @click="toggleMobileNav"> Contact Me </Link>
                </li>
                <li>
                    <Link :href="route('newsletter')" @click="toggleMobileNav"> Newsletter </Link>
                </li>
            </ul>
        </nav>
        <main>
            <slot />
        </main>
        <footer class="flex flex-col space-y-5 justify-between p-5">
            <p class="text-center">All rights reserved <span class="font-bold block md:inline-block">Jlad Lanete 2024
                    &copy;</span></p>
            <ul class="flex justify-center items-center space-x-5">
                <li><i class="fa fa-brands fa-facebook"></i></li>
                <li><i class="fa fa-brands fa-instagram"></i></li>
                <li><i class="fa fa-brands fa-twitter"></i></li>
                <li><i class="fa fa-brands fa-tiktok"></i></li>
            </ul>
        </footer>
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";
const Logo = ref("/images/logo.jpeg");
const alt = ref("logo");

const isDropdownVisible = ref(false);
const isMobileDropdownVisible = ref(false);
const isMobileNavVisible = ref(false);

const showDropdown = () => {
    isDropdownVisible.value = true;
};

const hideDropdown = () => {
    isDropdownVisible.value = false;
};

const toggleMobileDropdown = () => {
    isMobileDropdownVisible.value = !isMobileDropdownVisible.value;
};

const toggleMobileNav = () => {
    isMobileNavVisible.value = !isMobileNavVisible.value;
};

const handleClickOutside = (event) => {
    if (!event.target.closest('.mobile-nav') && !event.target.closest('.hamburger')) {
        isMobileNavVisible.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onBeforeUnmount(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<style scoped>
.blog-layout {
    background-color: white;
    min-height: 100vh;
}

ul a,
ul button {
    padding: 0.5rem 1rem;
    border-radius: 5px;
}

ul a:hover,
ul button:hover {
    background-color: #222831;
    color: white;
}

.mobile-nav a,
.mobile-nav button {
    margin: 0 !important;
    padding: .4rem 0 !important;
    display: block;
    width: 100%;
}

.hamburger {
    background: none;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}
</style>