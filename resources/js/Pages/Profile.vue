<script setup lang="ts">
    import { Link, useForm, usePage } from '@inertiajs/vue3';
    import Button from '../components/ui/Button.vue';
    import PostCard from '../components/cards/PostCard.vue';
    import { computed, ref, watch } from 'vue';
    import BaseLayout from '../layouts/BaseLayout.vue';
    import { PageProps } from '../types/inertia';
    import { Post } from '../types/Post';
import { useAuth } from '../services/auth';

    const { user : authUser } = useAuth();

    const props = defineProps<{
        user: any
        posts?: {
            data: Post []
        }
        total_posts: number
    }>()

    const posts = computed(() => props.posts?.data ?? [])
    const isLoaded = computed(() => !!props.posts)

</script>

<template>
    <BaseLayout>
        <header class="border-b border-neutral-300 flex items-center gap-6 p-4">
            <Link :href="route('feed.index')" class="p-3 rounded-full hover:bg-neutral-200"><i class="fas fa-arrow-left  text-2xl"></i></Link>
            <div class="flex flex-col min-w-0 max-w-full">
                <h1 class="text-3xl font-bold truncate">{{ user.name }}</h1>
                <p>{{ total_posts }} posts</p>
            </div>
        </header>
        <div class="">
            <header class="h-[300px] bg-blue-200">
                <!-- banner pic to add later -->
            </header>
            <div class="p-6 relative">
                <div class="top-[-80] md:top-[-100] absolute flex items-center justify-center h-[150px] w-[150px] md:h-[200px] md:w-[200px] bg-neutral-200 rounded-full">
                    <i class="fas fa-user text-4xl md:text-6xl"></i>
                </div>
                <div v-if="authUser.slug !== props.user.slug" class="flex w-full justify-end">
                    <Button class="rounded-full! font-semibold border border-neutral-400 px-6 hover:bg-orange-600 hover:text-white hover:border-transparent">Seguir</Button>
                </div>
                <div class="h-[50px] w-full" v-else></div>
            </div>

            <div class="p-6 max-w-full min-w-0 flex flex-col">
                <strong class="text-2xl break-all">{{ user.name }}</strong>
                <p class="text-2xl text-neutral-600 break-all">@{{ user.slug }}</p>
            </div>

            <div class="px-6">
                <div class="flex gap-4">
                    <p class="text-xl"><strong>0</strong> Seguindo</p>
                    <p class="text-xl"><strong>0</strong> Seguidores</p>
                </div>
            </div>

            <div class="flex w-full mt-6 border-b border-neutral-400">
                <Button class="w-full font-semibold rounded-none! hover:bg-neutral-200">Posts</Button>
                <Button class="w-full font-semibold rounded-none! hover:bg-neutral-200">Curtidas</Button>
            </div>

            <div v-if="isLoaded">
                <div v-for="post in posts" >
                    <PostCard class="border-b border-neutral-400" :post="post" />
                </div>
            </div>
        </div>
    </BaseLayout>
</template>