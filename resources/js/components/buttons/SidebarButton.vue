<script setup >
    import { Link } from '@inertiajs/vue3';
    import { cn } from '../../lib/utils';    

    defineProps({
        icon: String,
        title: String
    })
</script>

<!-- text-neutral-600 flex gap-2 text-xl items-center hover:text-orange-600 -->
<template>
    <Link :class="cn('gap-5 hover:bg-neutral-200 text-2xl lg:w-full p-3 cursor-pointer flex justify-start items-center rounded-lg whitespace-nowrap disabled:cursor-default disabled:scale-98 hover:scale-102 ease-out duration-300') " >
        <i :class=" icon ?? ''"></i>
        <p class="hidden lg:block">{{ title ?? '' }}</p>
    </Link>
</template>