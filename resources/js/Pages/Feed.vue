<script setup lang="ts">
    import NewPostCard from '../components/cards/NewPostCard.vue';
    import PostCard from '../components/cards/PostCard.vue';
    import SideBar from '../components/SideBar.vue';
    import RightSideBar from '../components/RightSideBar.vue'
    import { Deferred } from '@inertiajs/vue3'
    import { ref, watch } from 'vue';

    const props = defineProps<{
        posts: any
    }>()

    // Estado local reativo
    const posts = ref<any[]>([])
    const isLoaded = ref(false);

    // Quando o deferred carregar, copia para o array local
    watch(
        () => props.posts,
        (newPosts) => {
            if (newPosts) {
                posts.value = [...newPosts]
                isLoaded.value = true

                console.log(posts);
            }
        },
        { immediate: true }
    )

    const addPost = (payload: any) => {
        let post = payload.data;
        posts.value.unshift(post)
    }
</script>

<template>
    <div class="flex w-full min-h-screen">
        <SideBar />
        <main class="md:w-full bg-neutral-100 lg:max-w-[850px]">
            <header class="p-6 border-b border-neutral-300">
                <h1 class="text-3xl font-bold">Início</h1>
            </header>
            <div class="space-y-6 p-6">
                <NewPostCard @success="addPost"/>

                <div v-if="!isLoaded" data="posts">
                    <Deferred data="posts"> 
                        <template #fallback>
                            <div class="flex w-full justify-center mt-4">
                                <h3 class="text-3xl">Loading ...</h3>
                            </div>
                        </template>
                    </Deferred>
                </div>
                <div v-else class="flex flex-col w-full space-y-6">
                    <div v-for="post in posts" :key="post.id">
                        <PostCard :post="post" />
                    </div>
                </div>
            </div>
        </main>
        <RightSideBar />
    </div>
</template>