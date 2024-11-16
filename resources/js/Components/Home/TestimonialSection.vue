<script setup>
defineProps({
  logo: {
    type: String,
    required: true
  },
  testimonial: {
    type: Object,
    required: true,
    validator(value) {
      return (
        value.text &&
        value.author &&
        value.position &&
        typeof value.text === 'string' &&
        typeof value.author === 'string' &&
        typeof value.position === 'string'
      );
    }
  }
});
</script>

<template>
    <section class="relative px-6 py-24 bg-white isolate sm:py-32 lg:px-8">
      <div
        class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20" />
      <div
        class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center" />

      <div class="max-w-2xl mx-auto lg:max-w-4xl">
        <img class="h-12 mx-auto" :src="logo" alt="Company Logo" />
        <figure class="mt-10">
          <blockquote class="font-semibold text-center text-gray-900 text-xl/8 sm:text-2xl/9">
            <p>{{ testimonial.text }}</p>
          </blockquote>
          <figcaption class="mt-10">
            <div v-if="testimonial.image" class="flex items-center justify-center mt-4 space-x-3 text-base">
              <img class="w-12 h-12 mx-auto rounded-full" :src="testimonial.image" :alt="testimonial.author" />
            </div>
            <div class="flex items-center justify-center mt-4 space-x-3 text-base">
              <div class="font-semibold text-gray-900">{{ testimonial.author }}</div>
              <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                <circle cx="1" cy="1" r="1" />
              </svg>
              <div class="text-gray-600">{{ testimonial.position }}</div>
            </div>
          </figcaption>
        </figure>
      </div>
    </section>
  </template>
