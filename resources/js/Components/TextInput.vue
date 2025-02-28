<template>
    <div class="my-5">
        <label :for="forName" class="text-2xl mb-10">{{ inputLabel }}</label>
        <input :id="forName" :type="type"
            :class="['w-full p-2 border border-gray-300 rounded-md', { 'ring-1 ring-red-500': showErrorMessage }]"
            v-model="model" @input="handleInput" />
        <small class="text-red-600" v-if="showErrorMessage">{{ errorMessage }}</small>
    </div>
</template>
<script setup>
import { ref, computed, watch } from 'vue';

const model = defineModel({
    type: null,
    required: true
});

const props = defineProps({
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
});

const isTyping = ref(false);
const showErrorMessage = computed(() => {
    return props.errorMessage && !isTyping.value;
});

const handleInput = () => {
    isTyping.value = true;
};

// Reset error when input loses focus (optional)
watch(model, () => {
    isTyping.value = false;
});
</script>

<style scoped></style>

