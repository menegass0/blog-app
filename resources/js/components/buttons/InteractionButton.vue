<script setup >
    import { cn } from '../../lib/utils';
    import Button from '../ui/Button.vue';
    
    defineProps({
        counter: Number
    })
</script>

<template>
    <Button class="text-neutral-600 flex gap-2 text-xl items-center hover:text-orange-600 hover:text-2xl" >
        <slot />
        {{ counter }}
    </Button>
</template>