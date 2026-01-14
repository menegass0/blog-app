<script setup>
    import { cn } from '../../lib/utils';
</script>

<template>
    <div :class="cn('rounded-lg shadow-soft p-5')">
        <slot />
    </div>    
</template>