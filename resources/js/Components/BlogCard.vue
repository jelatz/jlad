<template>
    <div class="border rounded-md p-3 w-64 min-h-80 flex flex-col items-start justify-center space-y-2">
        <img :src="data.image ? `/storage/${data.image}` : defaultImage" :alt="data.alt || 'Blog Image'"
            class="object-cover w-full h-40 rounded-md">
        <small class="text-slate-400 text-xs">{{ formattedDate(data.created_at) }} - Jlad Lanete</small>
        <p class="text-sm">{{ data.title }}</p>
        <p class="line-clamp-2 break-all text-xs">{{ data.content }}</p>
    </div>
</template>
<script setup>
import { defineProps } from 'vue';
const defaultImage = "/images/img.jpeg";

// Function to format date correctly
const formattedDate = (date) => {
    return date
        ? new Date(date).toLocaleDateString("en-US", {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        })
        : "Unknown Date"; // Fallback if date is missing
};

defineProps({
    data: {
        type: Object,
        required: true
    }
});
</script>

