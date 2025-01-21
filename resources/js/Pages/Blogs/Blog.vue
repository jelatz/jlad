<template>

    <Head title=" | Blog" />
    <!-- container -->
    <div class="text-black py-2 w-11/12 mx-auto">
        <h1 class="mb-3 text-md">Recent Posts</h1>
        <div class="flex items-center space-x-5">
            <BlogCard v-for="(blog, index) in blogs" :key="index" :data="blog" />
        </div>

        <!-- SUMMARY ABOUT ME -->
        <div class="mt-20">
            <div class="w-full h-[40rem] bg-red-300"></div>

            <div class="container mt-10 w-[40rem]">
                <h5 class="mb-3">Hey There!</h5>
                <p class="mb-5">You can call me Jay. I am a late bloomer software engineer. Started my career way back
                    2019. Used
                    to work as a virtual assistant. I met some software engineers from Davao City and I got interested
                    in
                    what they do. I gave a shot about programming and got interested with it. I then proceed to a degree
                    level of Information Technology and the rest? You can check more about me
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
                <div class="container">
                    <p>Lifestyle</p>
                    <div class="flex items-center space-x-5 mt-3">
                        <BlogCard v-for="(blog, index) in lifeStyle" :key="index" :data="blog" />
                    </div>
                </div>
                <div class="container mt-10">
                    <p>Travels</p>
                    <div class="flex items-center space-x-5 mt-3">
                        <BlogCard v-for="(blog, index) in travelBlog" :key="index" :data="blog" />
                    </div>
                </div>
            </div>
            <!-- NEWSLETTER / COMMUNITY -->
            <div class="mt-16">
                <div class="w-[50rem] mx-auto">
                    <h3 class="text-4xl">Join My Newsletter!</h3>
                    <p class="mt-5">Why Subscribe, You Ask?</p>
                    <ul class="list-disc ml-5 mt-3">
                        <li>It's totally free!</li>
                        <li>I share insights, tips, and experiences from my journey as a late-bloomer software engineer
                            and an avid traveler. Whether you're into coding, hiking, running, or just exploring new
                            places, there’s something here for you.</li>
                        <li>From personal stories to practical advice, I dive into the must-know tools, books, podcasts,
                            and strategies that have helped me along the way.</li>
                        <li>You're not alone—many others have subscribed, and the biggest compliment I receive is that
                            my content is relatable and valuable.</li>
                        <li>I break things down in a way that’s easy to understand and enjoyable to read.</li>
                    </ul>
                    <p class="mt-3">So, what are you waiting for?</p>
                    <p class="font-bold mt-3">Join the community today!</p>

                    <div class="mt-10 w-96 flex items-center justify-center flex-col bg-slate-100 rounded-md mx-auto">
                        <img src="" alt="img">
                        <h1 class="my-5 text-xl">Add your email below!</h1>
                        <form action="" class="mb-5 text-center">
                            <input type="email" class="border p-2 w-80 mb-4" placeholder="Enter your email">
                            <input type="submit" value="Subscribe" class="bg-gray-800 text-white p-2 w-80 rounded-lg">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import BlogLayout from '@/Layouts/BlogLayout.vue';
import BlogCard from '@/Components/BlogCard.vue';
defineOptions({ layout: BlogLayout });

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
</script>

<style lang="scss" scoped></style>
