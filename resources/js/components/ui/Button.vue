<script setup lang="ts">
    import { InputHTMLAttributes} from 'vue';
    import { cn } from '../../lib/utils';
import { useVModel } from '@vueuse/core';

    const props = defineProps<{
        // modelValue?: string | number
        // type?: InputTypeHTMLAttribute
        disabled?: InputHTMLAttributes['disabled']
    }>()

    // const modelValue = defineModel('modelValue');
</script>

<template>
    <button :disabled="props.disabled" :class="cn('py-3 cursor-pointer flex justify-center items-center rounded-lg whitespace-nowrap disabled:cursor-default disabled:scale-98 hover:scale-102 ease-out duration-300')">
        <slot />
    </button>
</template>