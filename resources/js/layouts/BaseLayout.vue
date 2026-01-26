<script setup>
    import SideBar from '../components/SideBar.vue';
    import RightSideBar from '../components/RightSideBar.vue';
    import Modal from '../components/modals/Modal.vue';
    import { ref } from 'vue';  

    const showModal = ref(false);

</script>

<template>
    <div class="flex min-h-screen">
        <SideBar />
        <main class="w-screen md:w-full bg-white lg:max-w-[850px]">
            <Modal v-if="showModal" @close="showModal = false" />
            <slot @show.modal="showModal = true"></slot>
        </main>
        <RightSideBar />
    </div>
</template>