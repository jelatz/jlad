<template>
    <div class="my-5 overflow-auto">
        <label :for="forName" class="text-2xl mb-2 block">{{ inputLabel }}</label>
        <div ref="editor" class="w-full border border-gray-300 rounded-md quill-editor"></div>
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
                ['link', 'image']
            ]
        }
    });

    quill.on('text-change', () => {
        emit('update:modelValue', quill.root.innerHTML);
    });

    quill.root.innerHTML = props.modelValue;
});

watch(() => props.modelValue, (newValue) => {
    if (quill.root.innerHTML !== newValue) {
        quill.root.innerHTML = newValue;
    }
});
</script>

<style scoped>
.quill-editor {
    min-height: 200px;
    max-height: 400px;
    overflow: auto;
}
</style>