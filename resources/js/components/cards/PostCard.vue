<script setup lang="ts">
    import Card from './Card.vue';
    import InteractionButton from '../buttons/InteractionButton.vue';
    import { formatTimeAgo } from '../../services/time';
    import { Link } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import { createRepost, deleteRepost, toggleLikePost } from '../../services/post';
    import type { FeedItem } from '../../types/Post'
import { useAuth } from '../../services/auth';

    const props = defineProps<{
        class?: string,
        feedItem : FeedItem
    }>()

    const { user } = useAuth(); 

    const likes = ref(props.feedItem.post.likes_count)
    const liked = ref(props.feedItem.post.liked_by_me);

    const reposts = ref(props.feedItem.post.reposts_count)
    const reposted = ref(props.feedItem.post.reposted_by_me);

    function handleLikeButtonClick(){
        liked.value = !liked.value;

        if(liked.value){
            likes.value += 1;
        }else{
            likes.value -= 1;
        }

        toggleLikePost(props.feedItem.post_id);

    }

    function handleRepostButtonClick(){
        reposted.value = !reposted.value;

        if(!reposted.value){
            reposts.value -= 1;
            deleteRepost(props.feedItem.post_id);
        }else{
            reposts.value += 1;
            createRepost(props.feedItem.post_id);
        }
    }

    console.log(props.feedItem)
    console.log(user.value);

</script>

<template>
    <Link :href="route('posts.show', {'slug' : feedItem.post.user.slug, 'postId': feedItem.post.id})">
        <Card :class="props.class" class=" bg-white px-5! pt-3! pb-0 min-w-0 max-w-full" >
            <p v-if="feedItem.feed_type === 'repost'" class="pl-6 gap-5 flex items-center mb-2 max-w-full min-w-0">
                <i class="fas fa-retweet"></i>
                <span v-if="user.slug === feedItem.actor.slug">Você repostou</span>
                <Link :href="route('users.show', {user: feedItem.actor.id})" class="max-w-3/4 min-w-0 flex gap-2 hover:underline text-neutral-600" v-else>
                    <span class="shrink-1 truncate">{{ feedItem.actor.name }}</span> repostou
                </Link>
            </p>
            <div class="flex gap-4">
                <Link :href="route('users.show', {user: feedItem.post.user.slug})" class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                    <i class=" fas fa-user"></i>
                </Link>
                <div class="flex flex-col w-full min-w-0" >
                    <div class="w-full flex gap-2 items-start justify-between mb-2 min-w-0">
                        <div class="flex gap-2 w-full min-w-0">
                            <Link :feedItem.href="feedItem.post.user.slug"
                                class="text-xl font-semibold max-w-5/8 truncate hover:underline"
                            >
                                {{ feedItem.post.user.name }}
                            </Link>

                            <Link :href="feedItem.post.user.slug"
                                class="text-xl text-neutral-600 max-w-1/5 truncate"
                            >
                                @{{ feedItem.post.user.slug }}
                            </Link>

                            <p class="text-xl text-neutral-600">&#183;</p>
                            <p class="text-xl text-neutral-600 whitespace-nowrap">
                                {{ formatTimeAgo(feedItem.post.created_at) }}
                            </p>
                        </div>
                    </div>
                    <div class="text-xl break-all ">{{ feedItem.post.text }}</div>
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
            </div>
        </Card>
    </Link>
</template> 