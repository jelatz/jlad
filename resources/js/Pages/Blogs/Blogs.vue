<template>

    <Head :title="`| ${$page.component}`" />
    <!-- container -->
    <div class="text-black py-2 mx-auto">
        <div class="container px-5">
            <h1 class="mb-3 text-md">Recent Posts</h1>
            <div class="flex items-center gap-y-8 flex-wrap justify-left gap-x-12">
                <BlogCard v-for="(blog, index) in props.blogs.data.slice(0, 5)" :key="blog.id" :data="blog" />
            </div>
        </div>

        <!-- SUMMARY ABOUT ME -->
        <div class="mt-20">
            <Hero :data="heroData" />
            <!-- <div class="w-full h-[40rem] bg-red-300"></div> -->
            <div class="container mt-10 w-full md:w-[40rem] px-3 md:px-0">
                <h5 class="mb-3">Hey There!</h5>
                <p class="mb-5">"You can call me Jay. I'm a late bloomer when it comes to software engineering. I
                    started my career back in 2019, working as a virtual assistant. Along the way, I met some amazing
                    software engineers from Davao City, and I got really interested in what they do. That curiosity led
                    me to give programming a shot—and I was hooked! Eventually, I decided to pursue a degree in
                    Information Technology, and the rest is history. Want to know more?
                    <Link :href="route('about')" class="text-blue-600">Here!</Link>
                </p>
                <q>Success is not final, failure is not fatal: It is the courage to continue that
                    counts." –
                    Winston Churchill
                </q>
            </div>

            <!-- SOCIAL MEDIA ACCOUNTS -->
            <div class="mt-10">
                <ul class="flex justify-center items-center space-x-5">
                    <li v-for="(img, index) in socMed" :key="index">
                        <img :src="img" alt="social media icon" class="w-6 h-6">
                    </li>
                </ul>
            </div>

            <!-- Blogs -->
            <div class="mt-10">
                <div class="container px-3">
                    <p>Lifestyle</p>
                    <div class="flex items-center space-x-5 mt-3">
                        <BlogCard v-for="(blog, index) in lifeStyle" :key="index" :data="blog" />
                    </div>
                </div>
                <div class="container mt-10 px-3">
                    <p>Travels</p>
                    <div class="flex items-center space-x-5 mt-3">
                        <BlogCard v-for="(blog, index) in travelBlog" :key="index" :data="blog" />
                    </div>
                </div>
            </div>
            <div class="container px-4">
                <Newsletter class="" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import BlogLayout from '@/Layouts/BlogLayout.vue';
import BlogCard from '@/Components/BlogCard.vue';
import Hero from '@/Components/Hero.vue';
import Newsletter from '@/Components/Newsletter.vue'
defineOptions({ layout: BlogLayout });

const props = defineProps({
    blogs: Object,
    featuredBlogs: Number,
    activeBlogs: Number,
    inactiveBlogs: Number,
});

const socMed = ref([
    "/images/facebook.svg",
    "/images/twitter.svg",
    "/images/instagram.svg",
    "/images/tiktok.svg"
])

const blogs = ref([
    {
        title: 'How to create a blog using Laravel and Vue 3',
        img: '',
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Aug 20, 2021'
    },
    {
        title: "Life on life's terms. What does it mean?",
        img: "",
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Sept 20 2024'
    }
])

const travelBlog = ref([
    {
        title: 'Traveling to the Philippines',
        img: '',
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Aug 20, 2021'
    },
    {
        title: "Life on life's terms. What does it mean?",
        img: "",
        alt: 'sample image',
        author: 'Jlad Lanete',

    }
])

const lifeStyle = ref([
    {
        title: 'Traveling to the Philippines',
        img: '',
        alt: 'sample image',
        author: 'Jlad Lanete',
        date: 'Aug 20, 2021'
    },
    {
        title: "Life on life's terms. What does it mean?",
        img: "",
        alt: 'sample image',
        author: 'Jlad Lanete',

    }
])

const heroData = ref({
    img: '',
    alt: 'hero image',
    innerHeroTitle: 'Welcome to my blog',
    innerHeroDescription: 'A blog about my journey as a software engineer',
    titleStyle: 'text-4xl text-white',
    descriptionStyle: 'text-white mt-5',
    heroClass: 'mx-auto w-full h-[35rem] bg-red-800'
})
</script>

<style lang="scss" scoped></style>
