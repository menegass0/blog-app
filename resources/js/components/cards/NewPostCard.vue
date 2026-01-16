<script setup>
    import { ref } from 'vue';
    import Card from './Card.vue';
    import Button from '../ui/Button.vue'
    import { Form, useForm } from '@inertiajs/vue3';

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

    function createPost(){
        content.value = null;
        contentDiv.value.innerText = '';

        // emit('posting', {'success' : true, 'data': 'teste', 'msg': 'teste2'});

        formData.post(route('posts.store'), {
            onSuccess:() => {

            },
            onError: () => {

            },
            onFinish: () => {
            },
            preserveUrl:true
        })
    }
</script>

<template>
    <Card class="flex gap-4 bg-white p-5 shadow-lg" >
        <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
            <i class="fas fa-user"></i>
        </div>
        <Form class="w-full" method="post" @submit-prevent="createPost">
            <div class=" w-full relative">
                <div class="w-full text-3xl min-h-[72px] max-h-[300px] break-all focus:outline-none overflow-y-auto" ref="contentDiv" @blur="handleBlur" @input="handleInput" contenteditable="true"></div>
                <span v-if="!content" class="absolute top-0 text-3xl pointer-events-none text-neutral-500">O que está pensando?</span>
            </div>
            <div class="mt-3 pt-3 border-t border-neutral-300 flex justify-end">
                <Button :disabled="!content" type="button" @click="createPost" :class="{'gradient-bg': content, 'bg-orange-300': !content}" class="text-white py-3 px-6 gap-3">Publicar <i class="fa-regular fa-paper-plane"></i></Button>
            </div>
        </Form>
    </Card>
</template> 