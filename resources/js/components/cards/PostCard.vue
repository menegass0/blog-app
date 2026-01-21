<script setup>
    import Card from './Card.vue';
    import InteractionButton from '../buttons/InteractionButton.vue';
    import { formatTimeAgo } from '../../services/time';
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        post: {
            id: Number,
            text: String,
            created_at: Date,
            user: {
                slug: String,
                name: String
            }
        }
    })
</script>

<template>
    <Link :href="route('posts.show', {'slug' : post.user.slug, 'postId': post.id})">
        <Card class="flex gap-4 bg-white p-5 shadow-lg" >
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
                <div class="border-t w-full border-neutral-300 mt-4 flex justify-between pr-2">
                    <InteractionButton :counter="15">
                        <i class="fa-regular fa-comment"></i>
                    </InteractionButton>
                    <InteractionButton :counter="15">
                        <i class="fas fa-retweet"></i>
                    </InteractionButton>
                    <InteractionButton :counter="15">
                        <i class="fa-regular fa-heart"></i>
                    </InteractionButton>
                </div>
            </div>
            
        </Card>
    </Link>
</template> 