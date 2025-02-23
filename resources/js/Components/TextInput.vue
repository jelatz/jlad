<template>
    <div class="my-5">
        <label :for="forName" class="text-2xl mb-10">{{ inputLabel }}</label>
        <input :id="forName" :type="type"
            :class="['w-full p-2 border border-gray-300 rounded-md', { 'ring-1 ring-red-500': errorMessage }]"
            v-model="model" />
        <small class="text-red-600" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>


<script setup>
const model = defineModel({
    type: null,
    required: true
})
defineProps({
    forName: {
        type: String,
        required: true
    },
    inputLabel: {
        type: String,
        required: true
    },
    inputValue: {
        type: String,
    },
    type: {
        type: String,
        required: true
    },
    errorMessage: String

})
</script>

<style scoped></style>