<script setup>
    import Card from './Card.vue';
    import InteractionButton from '../buttons/InteractionButton.vue';
    import { formatTimeAgo } from '../../services/time';
    import { Link } from '@inertiajs/vue3';
    import { ref } from 'vue';
    import { toggleLikePost } from '../../services/post';

    const props = defineProps({
        class: null,
        post: {
            id: Number,
            text: String,
            created_at: Date,
            likes_count: Number,
            liked_by_me: Boolean,
            comments_count: Number,
            reposts_count: Number,
            user: {
                slug: String,
                name: String
            }
        } | null 
    })

    const likes = ref(props.post.likes_count)
    const liked = ref(props.post.liked_by_me);

    function handleLikeButtonClick(e){
        e.stopPropagation();

        liked.value = !liked.value;

        if(liked.value){
            likes.value += 1;
        }else{
            likes.value -= 1;
        }

        toggleLikePost(props.post.id);

    }

</script>

<template>
    <Link :href="route('posts.show', {'slug' : post.user.slug, 'postId': post.id})">
        <Card :class="props.class" class="flex gap-4 bg-white px-5! pt-3! pb-0 shadow-lg" >
            <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                <i class=" fas fa-user"></i>
            </div>
            <div class="flex flex-col w-full ">
                <div class="w-full flex gap-2 items-start justify-between mb-2">
                    <div class="flex gap-2">
                        <p class="text-xl font-semibold">{{ post.user.name }}</p>
                        <p class="text-xl text-neutral-600">@{{ post.user.slug }}</p >
                        <p class="text-xl text-neutral-600">&#183;</p>
                        <p class="text-xl text-neutral-600">{{ formatTimeAgo(post.created_at) }}</p>
                    </div>
                    <!-- <div class="">
                        ...
                    </div> -->
                </div>
                <div class="text-xl">{{ post.text }}</div>
                <div class="w-full flex justify-between items-end pr-2">
                    <InteractionButton :counter="0">
                        <i class="fa-regular fa-comment"></i>
                    </InteractionButton>
                    <InteractionButton :counter="15">
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