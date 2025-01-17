<template>
    <div @click="handleClickInside"
        class="absolute left-1/2 -bottom-32 -translate-x-1/2 px-5 rounded-md border border-black shadow-md bg-slate-50 bg-opacity-60">
        <ul>
            <li>Lifestyle</li>
            <li>Trekking</li>
            <li>Motorcycle Adventure</li>
            <li>Developer</li>
        </ul>
    </div>
</template>

<script setup>
const handleClickInside = (event) => {
    event.stopPropagation();
};
</script>

<style scoped></style>