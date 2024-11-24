<script setup>
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
import WhatsappChat from '@/Components/WhatsappChat.vue';
</script>

<template>
    <div>
        <Header />
        <slot />
        <Footer />

        <WhatsappChat v-if="$page.props.features.whatsapp_chat" :settings="$page.props.whatsappChatSettings"  />
    </div>
</template>

