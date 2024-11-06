<script setup>
defineProps({
  technologies: {
    type: Array,
    required: true,
    validator(value) {
      return value.every(tech => tech.name && tech.image && tech.width && tech.height);
    }
  }
});
</script>

<template>
    <div class="py-16 bg-white sm:py-16">
      <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <h2 class="font-semibold text-center text-gray-900 text-lg/8">
          Our <span class="text-yellow-600">Technologies</span>
        </h2>
        <div
          class="grid items-center max-w-lg grid-cols-4 mx-auto mt-10 gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
          <div v-for="(tech, index) in technologies" :key="tech.name" class="col-span-2 lg:col-span-1">
            <img
              :src="tech.image"
              :alt="tech.name"
              :width="tech.width"
              :height="tech.height"
              class="object-contain w-full max-h-14 lg:max-h-12"
            />
          </div>
        </div>
      </div>
    </div>
  </template>
