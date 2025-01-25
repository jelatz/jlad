<template>

    <Head title=" | Portfolio" />
    <div class="flex justify-center items-center mt-48 flex-col px-5 text-white">
        <h1 class="text-9xl uppercase font-bold text-[#00adb5] text-center">Jlad Lanete</h1>
        <div class="mt-5">
            <span class="text-6xl font-normal">{{ displayedText }}</span>
            <span v-if="isTyping" class="cursor text-6xl">|</span>
        </div>
    </div>
    <div class="my-36 w-full">
        <ul class="flex items-center justify-center gap-10">
            <li v-for="(image, index) in imagePaths" :key="index">
                <img :src="image" alt="Skills" class="w-10 h-10 mx-2" />
            </li>
            <i class="fa-brands fa-vuejs fa-2xl text-[#00adb5]"></i>
        </ul>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const texts = ["Software Engineer", "Virtual Assistant", "Content Creator"];
const displayedText = ref("");
const currentIndex = ref(0);
const isTyping = ref(true);
const speed = 130;

const typeAndDeleteText = () => {
    let index = 0; // Tracks the position in the current text
    let isDeleting = false; // Tracks whether we are typing or deleting

    const handleTyping = () => {
        const currentText = texts[currentIndex.value];

        if (!isDeleting && index < currentText.length) {
            // Typing phase
            displayedText.value += currentText[index++];
        } else if (isDeleting && index > 0) {
            // Deleting phase
            displayedText.value = displayedText.value.slice(0, --index);
        } else {
            // Switch between typing and deleting
            isDeleting = !isDeleting;

            if (!isDeleting) {
                // Move to the next text after deleting
                currentIndex.value = (currentIndex.value + 1) % texts.length;
            }

            // Pause between transitions
            setTimeout(handleTyping, isDeleting ? 1000 : 500);
            return; // Exit early to prevent interval overlap
        }

        setTimeout(handleTyping, isDeleting ? speed / 2 : speed);
    };

    handleTyping(); // Start the typing effect
};

onMounted(() => {
    typeAndDeleteText();
});

const imagePaths = ref([
    "/images/bootstrap.png",
    "/images/ci.png",
    "/images/css.png",
    "/images/github.png",
    "/images/html.png",
    "/images/js.png",
    "/images/laravel.png",
    "/images/mysql.png",
    "/images/php.png",
    "/images/sass.png",
    "/images/tailwind.png",
    "/images/wordpress.png",
]);
</script>

<style scoped>
.cursor {
    display: inline-block;
    animation: blink 0.6s steps(2, start) infinite;
}

@keyframes blink {

    0%,
    50% {
        opacity: 1;
    }

    51%,
    100% {
        opacity: 0;
    }
}
</style>
