<script setup>
    import Card from './Card.vue';

    defineProps({
        icon: String,
        title: String,
        desc: String
    })
</script>

<template>
    <Card class="flex flex-col items-center p-5 bg-white rounded-lg shadow-soft">
        <div class="text-2xl p-4 gradient-bg rounded-lg mb-6">
            <i class="text-white" :class="[icon]" />
        </div>
        <h4 class="text-2xl font-semibold mb-3">{{ title }}</h4>
        <p class="text-muted-foreground">{{ desc }}</p>
    </Card>
</template>