<template>
    <div class="my-5 overflow-auto">
        <label :for="forName" class="text-2xl mb-2 block">{{ inputLabel }}</label>
        <div ref="editor"
            :class="['w-full h-full max-h-[80rem] border border-gray-300 rounded-md quill-editor', { 'ring-1 ring-red-500': showErrorMessage }]"
            @click="focusEditor">
        </div>
        <small class="text-red-600" v-if="showErrorMessage">{{ errorMessage }}</small>
    </div>
</template>

<script setup>
import { ref, onMounted, watch, computed } from 'vue';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const props = defineProps({
    forName: {
        type: String,
        required: true
    },
    inputLabel: {
        type: String,
        required: true
    },
    modelValue: {
        type: String,
        required: true
    },
    errorMessage: String
});

const emit = defineEmits(['update:modelValue']);
const editor = ref(null);
let quill;
const isTyping = ref(false);

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: 'snow',
        formats: ['direction', 'align', 'header', 'bold', 'italic', 'underline', 'list', 'link', 'image'],
    });

    quill.root.setAttribute("dir", "ltr");
    quill.root.style.textAlign = "left";

    if (props.modelValue) {
        quill.setText(props.modelValue);
    }

    quill.on('text-change', () => {
        isTyping.value = true; // Reset error state when typing
        emit('update:modelValue', quill.getText().trim());
    });

    quill.on('selection-change', (range) => {
        if (!range) {
            isTyping.value = false; // Reset when focus is lost
        }
    });
});

watch(() => props.modelValue, (newValue) => {
    if (quill.getText().trim() !== newValue) {
        quill.setText(newValue);
    }
});

// Computed property to show/hide the error message
const showErrorMessage = computed(() => {
    return props.errorMessage && !isTyping.value;
});

const focusEditor = () => {
    quill.focus();
};

</script>

<style scoped>
.quill-editor {
    min-height: 200px;
    max-height: 400px;
    overflow: auto;
    cursor: text;
    direction: ltr;
        text-align: left;
}
</style>
