<script setup>
import { SocialChat } from 'vue-social-chat'
import 'vue-social-chat/dist/style.css'

const props = defineProps({
    settings: {
        type: Object,
        default: []
    },
});

const attendants = props.settings.attendants
    .filter(attendant => attendant.active)
    .map(attendant => {
        return {
            app: 'whatsapp',
            label: attendant.label,
            name: attendant.name,
            number: attendant.number.replace(/\D/g, ''),
            avatar: {
                src: attendant.avatar.src ?? attendant.avatar.icon ?? '/img/avatars/avatar-1.svg',
                alt: attendant.avatar.alt
            }
        }
    })
    ;

</script>

<template>
    <SocialChat icon :attendants="attendants" class="whatsapp-chat">
        <template #header>
            <p>{{ settings.header }}</p>
        </template>
        <template #button>
            <img src="https://raw.githubusercontent.com/ktquez/vue-social-chat/master/src/icons/whatsapp.svg"
                alt="icon whatsapp" aria-hidden="true">
        </template>
        <template #footer>
            <small>{{ settings.footer }}</small>
        </template>
    </SocialChat>
</template>

<style>
.whatsapp-chat {
    img {
        margin: auto;
    }

    --whatsapp: #46c056;
    --vsc-bg-header: var(--whatsapp);
    --vsc-bg-button: var(--whatsapp);
    --vsc-outline-color: var(--whatsapp);
    --vsc-border-color-bottom-header: #289D37;
}
</style>
