<script setup >
    import { Link } from '@inertiajs/vue3';
    import { cn } from '../../lib/utils';    

    defineProps({
        counter: Number,
        title: String
    })
</script>

<!-- text-neutral-600 flex gap-2 text-xl items-center hover:text-orange-600 -->
<template>
    <Link :class="cn('flex-col hover:bg-neutral-200 text-2xl lg:w-full p-3 cursor-pointer flex justify-center rounded-lg whitespace-nowrap disabled:cursor-default disabled:scale-98 hover:scale-102 ease-out duration-300') " >
        <p class="text-xl">{{ title }}</p>
        <p class="text-neutral-600 text-lg">{{ counter }}k posts</p>
    </Link>
</template>