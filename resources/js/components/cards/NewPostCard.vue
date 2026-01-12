<script setup>
    import { ref, watch } from 'vue';
    import Card from './Card.vue';

    const content = ref(null);
    const contentDiv = ref(null);

    watch(content, () => {
        console.log(content.value)
    })

    const normalize = (value) =>
        value.replace(/\u00A0/g, '').trim()

    function handleInput(){
        content.value = normalize(contentDiv.value.innerText);

        console.log(content.value.length);
    }
</script>

<template>
    <Card class="flex gap-4 bg-white p-5 shadow-lg" >
        <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
            <i class=" fas fa-user"></i>
        </div>
        <div class="w-full">
            <div class=" w-full relative">
                <div class="w-full text-3xl min-h-[72px] max-h-[300px] break-all focus:outline-none" ref="contentDiv" @blur="handleBlur" @input="handleInput" contenteditable="true"></div>
                <span v-if="!content" class="absolute top-0 text-3xl text-neutral-600">O que está pensando?</span>
            </div>
            <div class="mt-3 pt-3 border-t border-neutral-300">teste</div>
        </div>
    </Card>
</template> 