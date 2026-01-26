<script setup lang="ts">
    import Card from './Card.vue';
    import InteractionButton from '../buttons/InteractionButton.vue';
    import { formatTimeAgo } from '../../services/time';
    import { Link } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import { createRepost, deleteRepost, toggleLikePost } from '../../services/post';
    import type { Post } from '../../types/Post'

    const props = defineProps<{
        class?: string,
        post: Post
    }>()

    const likes = ref(props.post.likes_count)
    const liked = ref(props.post.liked_by_me);

    const reposts = ref(props.post.reposts_count)
    const reposted = ref(props.post.reposted_by_me);

    function handleLikeButtonClick(){
        liked.value = !liked.value;

        if(liked.value){
            likes.value += 1;
        }else{
            likes.value -= 1;
        }

        toggleLikePost(props.post.id);

    }

    function handleRepostButtonClick(){
        reposted.value = !reposted.value;

        if(!reposted.value){
            reposts.value -= 1;
            deleteRepost(props.post.id);
        }else{
            reposts.value += 1;
            createRepost(props.post.id);
        }
    }

</script>

<template>
    <Link :href="route('posts.show', {'slug' : post.user.slug, 'postId': post.id})">
        <Card :class="props.class" class="flex gap-4 bg-white px-5! pt-3! pb-0 shadow-lg " >
            <Link :href="route('users.show', {user: post.user.slug})" class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                <i class=" fas fa-user"></i>
            </Link>
            <div class="flex flex-col w-full min-w-0" >
                <div class="w-full flex gap-2 items-start justify-between mb-2 min-w-0">
                    <div class="flex gap-2 w-full min-w-0">
                        <Link
                            class="text-xl font-semibold max-w-5/8 truncate hover:underline"
                        >
                            {{ post.user.name }}
                        </Link>

                        <Link
                            class="text-xl text-neutral-600 max-w-1/5 truncate"
                        >
                            @{{ post.user.slug }}
                        </Link>

                        <p class="text-xl text-neutral-600">&#183;</p>
                        <p class="text-xl text-neutral-600 whitespace-nowrap">
                            {{ formatTimeAgo(post.created_at) }}
                        </p>
                    </div>
                </div>
                <div class="text-xl break-all ">{{ post.text }}</div>
                <div class="w-full flex justify-between items-end pr-2">
                    <InteractionButton :counter="0" @click.prevent.stop="">
                        <i class="fa-regular fa-comment"></i>
                    </InteractionButton>
                    <InteractionButton :counter="reposts" :active="reposted" @click.prevent.stop="handleRepostButtonClick">
                        <i class="fas fa-retweet"></i>
                    </InteractionButton>
                    <InteractionButton @click.prevent.stop="handleLikeButtonClick" :active="liked" :counter="likes">
                        <i class="fa-regular fa-heart"></i>
                    </InteractionButton>
                </div>
            </div>
            
        </Card>
    </Link>
</template> 