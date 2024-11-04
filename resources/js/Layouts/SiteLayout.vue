<script setup>
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
</script>

<template>
    <div class="bg-white">
        <Header />
        <slot />
        <Footer />
    </div>
</template>
