<template>
  <div class="grid place-items-center">
    <div class="relative w-64 h-56 rounded-lg overflow-hidden border border-slate-300">
      <label for="imageUpload"
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 grid content-end cursor-pointer">
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
  errorMessage: String,
  label: {
    type: String,
    default: 'Upload Image',
  },
});

const emit = defineEmits(['update:modelValue']);

const previewImage = ref(null);

// Watch for existing image URL when opening modal
watch(() => props.modelValue, (newValue) => {
  if (typeof newValue === 'string') {
    previewImage.value = newValue; // Set preview to existing image URL
  }
});

const onFileChange = (e) => {
  const file = e.target.files[0];
  if (file) {
    previewImage.value = URL.createObjectURL(file);
    emit('update:modelValue', file);
  }
};
</script>

<style scoped>
input[type="file"] {
  display: none;
}
</style>
