<script setup>
    import NewPostCard from '../components/cards/NewPostCard.vue';
    import PostCard from '../components/cards/PostCard.vue';
</script>

<template>
    <div class="flex w-full min-h-screen">
        <aside class="hidden lg:flex flex-col w-140 border-r-2 border-neutral-300"></aside>
        <main class="w-full bg-neutral-100 max-w-[800px]">
            <header class="p-6 border-b border-neutral-300">
                <h1 class="text-3xl font-bold">Início</h1>
            </header>
            <div class="space-y-6 p-6">
                <NewPostCard />
                <PostCard />
            </div>
        </main>
        <aside class="hidden lg:flex flex-col w-200 border-l border-neutral-300 bg-neutral-100"></aside>
    </div>
</template>