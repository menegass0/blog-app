<script setup>
    import Card from './Card.vue';

    defineProps({
        icon: String,
        title: String,
        desc: String
    })
</script>

<template>
    <Card class="flex flex-col bg-white py-6 px-10 items-center">
        <div class="text-2xl p-4 gradient-bg rounded-lg mb-6">
            <i class="text-white" :class="[icon]" />
        </div>
        <h4 class="text-3xl font-semibold mb-3">{{ title }}</h4>
        <p class="text-center text-neutral-600 text-xl">{{ desc }}</p>
    </Card>
</template>