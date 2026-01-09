<script setup lang="ts">
    import { cn } from '../../lib/utils';
    import Card from '../cards/Card.vue';

    // const modelValue = defineModel('modelValue');
</script>

<template>
    <Card :class="cn('bg-red-200 p-5 border border-red-500')">
        <slot />
    </Card>
</template>