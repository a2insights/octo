
<script setup>
const props = defineProps({
  text: {
    type: String,
    default: "How to get started ?"
  },
  url: {
    type: String,
    default: "/docs"
  },
  linkText: {
    type: String,
    default: "📕 Documentation"
  },
  textColor: {
    type: String,
    default: "text-gray-600"
  },
  linkColor: {
    type: String,
    default: "text-[#487634]"
  },
  ringColor: {
    type: String,
    default: "ring-gray-900/10"
  },
  hoverRingColor: {
    type: String,
    default: "hover:ring-gray-900/20"
  }
});
</script>

<template>
    <div
      :class="[
        'relative px-3 py-1 rounded-full text-sm ring-1 hover:ring-opacity-20',
        textColor,
        ringColor,
        hoverRingColor
      ]"
    >
      {{ text }}
      <a
        :href="url"
        target="_blank"
        rel="noopener noreferrer"
        :class="['font-semibold', linkColor]"
      >
        <span class="absolute inset-0" aria-hidden="true"></span>
        {{ linkText }}
        <span aria-hidden="true">&rarr;</span>
      </a>
    </div>
  </template>
