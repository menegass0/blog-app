<script setup>
    import NewPostCard from '../components/cards/NewPostCard.vue';
</script>

<template>
    <div class="flex w-full min-h-screen">
        <aside class="hidden lg:flex flex-col w-140 border"></aside>
        <main class="w-full bg-neutral-100">
            <header class="p-6 border-b">
                <h1 class="text-3xl font-bold">Início</h1>
            </header>
            <div class="p-6">
                <NewPostCard />
            </div>
        </main>
        <aside class="hidden lg:flex flex-col w-200 border bg-neutral-100"></aside>
    </div>
</template>