<script setup lang="ts">
    import { cn } from '../../lib/utils';
    import Card from '../cards/Card.vue';

    // const modelValue = defineModel('modelValue');

    defineProps({
        errors: Object
    })
</script>

<template>
    <Card :class="cn('bg-red-200 p-5 border border-red-500')">
        <ul>
            <li class="list-disc ms-3" v-for="(value, key, index) in errors" :key="key">
                <div v-if="value.length == 1">
                    {{ value[0] }}
                </div>
                <li v-else="" v-for="(value2, key2, index2) in value" :key="key">
                    {{ value2 }}
                </li>
            </li>
        </ul>
    </Card>
</template>