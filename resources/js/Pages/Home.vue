<template>
    <Layout>
        <div class="flex justify-center items-center mt-48 flex-col">
            <h1 class="text-9xl uppercase font-bold text-[#00adb5]">Jlad Lanete</h1>
            <div class="mt-5">
                <span class="text-6xl font-normal">{{ displayedText }}</span>
                <span v-if="isTyping" class="cursor text-6xl">|</span>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Layout from '@/Layouts/Layout.vue';

const texts = ['Software Engineer', 'Virtual Assistant', 'Content Creator'];
const displayedText = ref('');
const currentIndex = ref(0);
const isTyping = ref(true);
const speed = 130;

const typeAndDeleteText = () => {
    const currentText = texts[currentIndex.value];
    let index = 0;
    let isDeleting = false;

    const interval = setInterval(() => {
        if (!isDeleting && index < currentText.length) {
            displayedText.value += currentText[index++];
        } else if (isDeleting && index > 0) {
            displayedText.value = displayedText.value.slice(0, --index);
        } else {
            isDeleting = !isDeleting;
            if (!isDeleting) {
                currentIndex.value = (currentIndex.value + 1) % texts.length;
            }
            setTimeout(() => {}, isDeleting ? 1000 : 500);
        }
    }, isDeleting ? speed / 2 : speed);
};

onMounted(() => {
    typeAndDeleteText();
});
</script>

<style scoped>
.cursor {
    display: inline-block;
    animation: blink 0.6s steps(2, start) infinite;
}

@keyframes blink {
    0%, 50% {
        opacity: 1;
    }
    51%, 100% {
        opacity: 0;
    }
}
</style>