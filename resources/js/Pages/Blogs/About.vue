<template>
    <div class="text-black py-2 w-full mx-auto">
        <Hero :data="hero" />

    </div>
</template>


<script setup>
import BlogLayout from '@/Layouts/BlogLayout.vue';
import Hero from '@/Components/Hero.vue';
import { ref } from 'vue';
defineOptions({ layout: BlogLayout });


const hero = ref({
    img: "",
    alt: "Sample image",
    innerHeroTitle: "sample title",
    innerHeroDescription: "sample description",
    titleStyle: "text-white",
    descriptionStyle: "text-2xl"
}
)

</script>

<style scoped></style>