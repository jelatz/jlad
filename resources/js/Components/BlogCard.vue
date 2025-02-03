<template>
    <Link :href="route('blog', { id: data.id })">
    <div class="border rounded-md p-3 w-64 flex flex-col items-start justify-center space-y-2">
        <img :src="data.img" :alt="data.alt" class="object-cover w-full h-40 rounded-md">
        <small class="text-slate-400 text-xs">{{ data.date }} - {{ data.author }}</small>
        <p class="text-sm">{{ data.title }}</p>
    </div>
    </Link>
</template>


<script setup>
import { ref, defineProps } from 'vue';

defineProps({
    data: {
        type: Object,
        required: true
    }
})

</script>

<style scoped></style>