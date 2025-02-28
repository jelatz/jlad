<template>
  <div class="grid place-items-center">
    <div class="relative w-64 h-56 rounded-lg overflow-hidden border border-slate-300 group">
      <!-- Show label only when hovered if modelValue exists -->
      <label for="imageUpload"
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 grid content-end cursor-pointer bg-black/50 text-white px-2 py-1 rounded-md transition-opacity duration-300 text-sm"
        :class="{ 'opacity-0 group-hover:opacity-100': modelValue, 'opacity-100': !modelValue }">
        {{ label }}
      </label>
      <input type="file" id="imageUpload" @change="onFileChange" hidden accept="image/*" />
      <img :src="previewImage || modelValue || defaultImage" alt="Preview" class="object-cover w-full h-full">
    </div>
    <p class="text-red-600" v-if="errorMessage">{{ errorMessage }}</p>
  </div>
</template>

<script setup>
import { ref, defineProps, defineEmits, watch } from 'vue';

const props = defineProps({
  modelValue: [File, String], // Accept both File and String (image URL)
  defaultImage: {
    type: String,
    default: '/images/img.jpeg',
  },
  label: {
    type: String,
    default: 'Upload Image',
  },
});

const emit = defineEmits(['update:modelValue']);

const previewImage = ref(null);
const errorMessage = ref("");

// Watch for existing image URL when opening modal
watch(() => props.modelValue, (newValue) => {
  if (typeof newValue === 'string') {
    previewImage.value = newValue; // Set preview to existing image URL
  }
});

const onFileChange = (e) => {
  const file = e.target.files[0];

  if (!file) return; // Ensure a file is selected

  if (file.size > 300 * 1024) { // Convert 300KB to bytes
    errorMessage.value = 'File size must be less than 300KB';
    return;
  }

  errorMessage.value = ''; // Clear any previous error
  previewImage.value = URL.createObjectURL(file);
  emit('update:modelValue', file);
};
</script>

<style scoped>
input[type="file"] {
  display: none;
}
</style>
