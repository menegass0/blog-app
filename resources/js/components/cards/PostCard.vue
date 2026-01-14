<script setup>
    import Card from './Card.vue';
    import InteractionButton from '../buttons/InteractionButton.vue';
</script>

<template>
    <Card class="flex gap-4 bg-white p-5 shadow-lg" >
        <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
            <i class=" fas fa-user"></i>
        </div>
        <div class="flex flex-col w-full ">
            <div class="w-full flex gap-2 items-start justify-between mb-2">
                <div class="flex gap-2">
                    <p class="text-xl font-semibold">nome do usuario</p>
                    <p  class="text-xl text-neutral-600">@do_usuario</p >
                    <p class="text-xl text-neutral-600">&#183;</p>
                    <p class="text-xl text-neutral-600">1h</p>
                </div>
                <div class="">
                    ...
                </div>
            </div>
            <div class="text-xl">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat voluptate porro natus nobis! Exercitationem illo quidem nesciunt voluptatibus ab animi ipsam quo nam porro magni cupiditate tempora in debitis, itaque odio, ipsum sint ut, incidunt reiciendis numquam! Vitae alias eius excepturi harum dolore assumenda voluptatibus, mollitia minima culpa, voluptate blanditiis.</div>
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
</template> 