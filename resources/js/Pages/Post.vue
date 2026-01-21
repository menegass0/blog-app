<script setup>
    import { Link, useForm, usePage } from '@inertiajs/vue3';
    import RightSideBar from '../components/RightSideBar.vue';
    import SideBar from '../components/SideBar.vue';
    import { computed, ref } from 'vue';
    import InteractionButton from '../components/buttons/InteractionButton.vue';
    import { getFullDate, getHourAMPM } from '../services/time';

    const page = usePage();
    const user = computed(() => page.props.auth.user);
    const post = computed(() => page.props.post);

    const content = ref(null);
    const contentDiv = ref(null);

    const normalize = (value) =>
        value.replace(/\u00A0/g, '').trim()

    function handleInput(){
        content.value = normalize(contentDiv.value.innerText);
        formData.text = content.value;
    }

    const emit = defineEmits(['success', 'error'])

    const formData = useForm({
        text: String | null,
    })

    function handleSubmit(){

    }
    
</script>

<template>
    <div class="flex w-full min-h-screen">
        <SideBar />
        <main class="md:w-full bg-white lg:max-w-[850px]">
            <header class="border-b border-neutral-300 flex items-center gap-6 p-4">
                <Link :href="route('feed.index')" class="p-3 rounded-full hover:bg-neutral-200"><i class="fas fa-arrow-left  text-2xl"></i></Link>
                <h1 class="text-3xl font-bold">Post</h1>
            </header>
            <div class="p-6">
                <div class="flex gap-4 mb-3">
                    <div class="bg-blue-200 flex items-center justify-center w-[60px] h-[60px] rounded-full">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="hidden lg:flex flex-col">
                        <strong class="text-2xl">{{ user.name }}</strong>
                        <p>@{{ user.slug }}</p>
                    </div>
                </div>
                <div class="w-full pb-3">
                    <p class="text-2xl mb-3">
                        {{ post.text }}
                    </p>    
                    <div class="flex gap-1 text-neutral-500">
                        <p>{{ getHourAMPM(post.created_at) }}</p>
                        <span>&#183;</span>
                        <p>{{ getFullDate(post.created_at) }}</p>
                        <span>&#183;</span>
                        <p><strong class="text-black">200 mill</strong> Visualizações</p>
                    </div>
                </div>
                <div class="flex gap-20 border-y border-neutral-300">
                    <InteractionButton :counter="0"><i class="fa-regular fa-comment"></i></InteractionButton>
                    <InteractionButton :counter="0"><i class="fas fa-retweet"></i></InteractionButton>
                    <InteractionButton :counter="0"><i class="fa-regular fa-heart"></i></InteractionButton>
                </div>
                <div class="flex gap-3 py-6 border-b border-neutral-300">
                    <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                        <i class="fas fa-user"></i>
                    </div>
                    <Form class="w-full" method="post" @submit-prevent="handleSubmit">
                        <div class=" w-full relative">
                            <div  class="w-full text-3xl min-h-[72px] max-h-[150px] break-all focus:outline-none overflow-y-auto" ref="contentDiv" @blur="handleBlur" @input="handleInput" contenteditable="true"></div>
                            <span v-if="!content" class="absolute top-0 text-3xl pointer-events-none text-neutral-500">Postar Sua Resposta</span>
                        </div>
                        <div class="pt-3 border-t border-neutral-300 flex justify-end">
                            <Button :disabled="!content" type="button" @click="handleSubmit" :class="{'gradient-bg': content, 'bg-orange-300': !content}" class="text-white py-3 px-6 gap-3 rounded-lg font-semibold">Responder</Button>
                        </div>
                    </Form>
                </div>
            </div>
        </main>
        <RightSideBar />
    </div>
</template>