<template>
    <div class="my-5">
        <label :for="forName" class="text-2xl mb-2 block">{{ inputLabel }}</label>
        <textarea class="w-full p-2 border border-gray-300 rounded-md" :cols="cols" :rows="rows" :id="forName"
            v-model="model">
        </textarea>
        <small class="text-red-600" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>

<script setup>
const model = defineModel();

defineProps({
    forName: {
        type: String,
        required: true
    },
    inputLabel: {
        type: String,
        required: true
    },
    cols: {
        type: Number,
        default: 30
    },
    rows: {
        type: Number,
        default: 10
    },
    errorMessage: String
});
</script>

<style scoped></style>
