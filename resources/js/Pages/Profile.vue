<script setup lang="ts">
    import { Link, useForm, usePage } from '@inertiajs/vue3';
    import RightSideBar from '../components/RightSideBar.vue';
    import SideBar from '../components/SideBar.vue';
    import Button from '../components/ui/Button.vue';

    const props = defineProps<{
        user: any
        posts: any
        total_posts: number
    }>()

</script>

<template>
    <div class="flex w-full min-h-screen">
        <SideBar />
        <main class="w-full bg-white lg:max-w-[850px]">
            <header class="border-b border-neutral-300 flex items-center gap-6 p-4">
                <Link :href="route('feed.index')" class="p-3 rounded-full hover:bg-neutral-200"><i class="fas fa-arrow-left  text-2xl"></i></Link>
                <div class="flex flex-col">
                    <h1 class="text-3xl font-bold">{{ user.name }}</h1>
                    <p>{{ total_posts }} posts</p>
                </div>
            </header>
            <div class="">
                <header class="h-[300px] bg-blue-200">
                    <!-- banner pic to add later -->
                </header>
                <div class="p-6 relative">
                    <div class="top-[-100] absolute flex items-center justify-center h-[200px] w-[200px] bg-neutral-200 rounded-full">
                        <i class="fas fa-user fa-4x"></i>
                    </div>
                    <div class="flex w-full justify-end">
                        <Button class="rounded-full! font-semibold border border-neutral-400 px-6 hover:bg-orange-600 hover:text-white hover:border-transparent">Seguir</Button>
                    </div>
                </div>

                <div class="p-6">
                    <strong class="text-2xl">{{ user.name }}</strong>
                    <p class="text-2xl text-neutral-600">@{{ user.slug }}</p>
                </div>

                <div class="px-6">
                    <div class="flex gap-4">
                        <p class="text-xl"><strong>0</strong> Seguindo</p>
                        <p class="text-xl"><strong>0</strong> Seguidores</p>
                    </div>
                </div>

                <div class="flex w-full mt-6">
                    <Button class="w-full font-semibold rounded-none! hover:bg-neutral-200">Posts</Button>
                    <Button class="w-full font-semibold rounded-none! hover:bg-neutral-200">Curtidas</Button>
                </div>
            </div>
        </main>
        <RightSideBar />
    </div>
</template>