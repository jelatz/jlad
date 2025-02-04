<template>
    <div class="my-5">
        <label :for="forName">{{ label }}</label>
        <input :type="type" :id="id" class="w-full p-2 border border-gray-300 rounded-md" v-model="model">
        <small class="bg-red-600" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>


<script setup>
import { type } from 'jquery';
const model = defineModel({
    type: String,
    required: true
})
defineProps({
    forName: {
        type: String,
        required: true
    },
    label: {
        type: String,
        required: true
    },
    type: {
        type: String,
        required: true
    },
    id: {
        type: String,
        required: true
    },
    errorMessage: String

})
</script>

<style scoped></style>