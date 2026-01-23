<script setup lang="ts">
    import NewPostCard from '../components/cards/NewPostCard.vue';
    import PostCard from '../components/cards/PostCard.vue';
    import SideBar from '../components/SideBar.vue';
    import RightSideBar from '../components/RightSideBar.vue'
    import { Deferred } from '@inertiajs/vue3'
    import { ref, watch } from 'vue';
    import BaseLayout from '../layouts/BaseLayout.vue';


    const props = defineProps<{
        posts: any
    }>()

    const posts = ref<any[]>([])
    const isLoaded = ref(false);

    watch(
        () => props.posts,
        (newPosts) => {
            if (newPosts) {
                posts.value = [...newPosts]
                isLoaded.value = true
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
    <BaseLayout>
        <header class="p-6 border-b border-neutral-300">
            <h1 class="text-3xl font-bold">Início</h1>
        </header>
        <div class="">
            <NewPostCard class="border-b border-neutral-400 rounded-none!" @success="addPost"/>

            <div v-if="!isLoaded" data="posts">
                <Deferred data="posts"> 
                    <template #fallback>
                        <div class="flex w-full justify-center mt-4">
                            <h3 class="text-3xl">Loading ...</h3>
                        </div>
                    </template>
                </Deferred>
            </div>
            <div v-else class="flex flex-col w-full">
                <div v-for="post in posts" :key="post.id">
                    <PostCard class="border-b border-neutral-400" :post="post" />
                </div>
            </div>
        </div>
    </BaseLayout>
</template>