<template>
    <div class="my-5 overflow-auto">
        <label :for="forName" class="text-2xl mb-2 block">{{ inputLabel }}</label>
        <div 
            ref="editor" 
            :class="['w-full h-full border border-gray-300 rounded-md quill-editor', {'ring-1 ring-red-500' : errorMessage}]"
            @click="focusEditor">
        </div>
        <small class="text-red-600" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
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

onMounted(() => {
    quill = new Quill(editor.value, {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['link', 'image'],
                [{ 'direction': 'ltr' }]  // add toolbar button if needed
            ]
        },
        formats: ['direction', 'align'],
    });

    // Set editor to LTR
    quill.root.setAttribute("dir", "ltr");
    quill.root.style.textAlign = "left";

    // Use quill.setText to initialize text
    if (props.modelValue) {
        quill.setText(props.modelValue);
    }

    quill.on('text-change', () => {
        // Get plain text instead of HTML and emit it
        emit('update:modelValue', quill.getText().trim());
    });
});

// Watch modelValue changes from parent component and use setText to update the editor
watch(() => props.modelValue, (newValue) => {
    if (quill.getText().trim() !== newValue) {
        quill.setText(newValue);
        quill.root.setAttribute("dir", "ltr");
        quill.root.style.textAlign = "left";
    }
});

// Focus editor when clicked anywhere inside it
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
