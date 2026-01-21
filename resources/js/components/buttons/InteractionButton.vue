<script setup >
    import { cn } from '../../lib/utils';
    import Button from '../ui/Button.vue';
    
    defineProps({
        counter: Number,
        active: Boolean
    })
</script>

<template>
    <Button :class="[active ? 'text-orange-600' : 'text-neutral-600']" class="flex gap-2 text-xl items-center hover:text-orange-600" >
        <slot />
        {{ counter }}
    </Button>
</template>