<script setup lang="ts">
    import { HTMLAttributes, InputTypeHTMLAttribute } from 'vue';
    import { cn } from '../../lib/utils';
import { useVModel } from '@vueuse/core';

    const props = defineProps<{
        modelValue?: string | number
        type?: InputTypeHTMLAttribute
        class?: HTMLAttributes["class"]
    }>()

    const modelValue = defineModel('modelValue');
</script>

<template>
    <input v-model="modelValue" :type="props.type ? props.type : 'text'" :class="cn(
        'flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
        props.class
    )">
</template>