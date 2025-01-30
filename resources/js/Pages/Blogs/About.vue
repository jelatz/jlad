<template>
    <div class="text-black py-2 w-[55rem] mx-auto my-16">
        <h1 class="text-5xl text-center">Who Am I?</h1>
        <img :src="ownImg" alt="jlad profile picture" class="w-[40rem] mx-auto my-8 rounded-lg">
        <h3 class="text-2xl mt-20">Hey There!</h3>
        <p class="my-6">You can call me Jay. I'm a late bloomer in the world of software engineering, but better late
            than never, right? My journey into tech started back in 2019 when I was working as a virtual assistant. It
            was during that time that I met some incredible software engineers from Davao City, and I couldn’t help but
            be fascinated by what they did. Their passion sparked my curiosity, and I decided to give programming a
            shot.
            <br><br>
            What started as simple curiosity quickly turned into a deep interest. I found myself diving into coding
            tutorials, experimenting with different technologies, and realizing that this was something I genuinely
            enjoyed. Eventually, I took the leap and pursued a degree in Information Technology to build a solid
            foundation for my career.
            <br><br>
            Since then, it's been an exciting journey—full of challenges, learning experiences, and small victories
            along the way. From late-night debugging sessions to the thrill of building something from scratch, every
            step has been worth it.
            <br><br>
            Today, I’m passionate about sharing my experiences, whether it’s about coding, hiking, running, or just life
            in general. I believe growth is a continuous process, and I’m always looking forward to what’s next.

            Want to know more? Stick around and join me on this adventure!
        </p>

        <Newsletter />
    </div>
</template>


<script setup>
import BlogLayout from '@/Layouts/BlogLayout.vue';
import Newsletter from '@/Components/Newsletter.vue';
// import Hero from '@/Components/Hero.vue';
import { ref } from 'vue';
defineOptions({ layout: BlogLayout });

const ownImg = ref('/images/about-img.jpg')


// const hero = ref({
//     img: "",
//     alt: "Sample image",
//     innerHeroTitle: "Jlad Lanete",
//     innerHeroDescription: "sample description",
//     titleStyle: "text-white",
//     descriptionStyle: "text-2xl"
// }
// )

</script>

<style scoped></style>