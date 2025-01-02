<template>
    <div>
        <h1>This is an about page {{ user }}</h1>
    </div>
</template>

<script setup>
defineProps({
    user: String,
});
</script>
