<script setup lang="ts">
    import NewPostCard from '../components/cards/NewPostCard.vue';
    import PostCard from '../components/cards/PostCard.vue';
    import SidebarButton from '../components/buttons/SidebarButton.vue';
    import { Link } from '@inertiajs/vue3';
    import Input from '../components/ui/Input.vue'
    import Card from '../components/cards/Card.vue';
    import TrendButton from '../components/buttons/TrendButton.vue'
    import Button from '../components/ui/Button.vue';
    import { ref } from 'vue';

    const props = defineProps({posts : Object});

    console.log(props.posts)
</script>

<template>
    <div class="flex w-full min-h-screen">
        <aside class="flex sticky top-0 max-h-screen justify-end w-30 lg:w-140 border-r-2 border-neutral-300">
            <div class="max-w-[350px] w-full flex flex-col gap-3 px-3 lg:pl-5 lg:pr-10 pt-6 pb-12 items-center xl:items-start">
                <header class="flex items-center justify-center lg:justify-start w-full gap-3 mb-6">
                    <div class="gradient-bg p-2 rounded-lg">
                        <i class="fas fa-eye text-white text-3xl"></i>
                    </div>
                    <h1 class="gradient-text text-3xl font-bold hidden lg:block">Conecta</h1>
                </header>

                <!-- <SidebarButton title="Home" class="" icon="fa-regular fa-home" href="test"/> -->
                <!-- <SidebarButton title="Perfil" class="" icon="fa-regular fa-user" href="test"/> -->
                <!-- <SidebarButton title="Home" class="" icon="fa-regular fa-home" href="test"/> -->

                <div class="mt-auto border-t border-neutral-300 lg:w-full pt-4">
                    <div class="flex gap-3 mb-6">
                        <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="hidden lg:flex flex-col">
                            <strong>Nome do Usuário</strong>
                            <p>@do_usuario</p>
                        </div>
                    </div>
                    <Link href="/logout" class="w-full flex gap-3 p-3 items-center hover:bg-neutral-200 hover:text-red-500 rounded-lg">
                        <i class=" fa-solid fa-arrow-right-from-bracket"></i>
                        <p class="hidden lg:block">Sair</p>
                    </Link>
                </div>
            </div>
        </aside>
        <main class="md:w-full bg-neutral-100 lg:max-w-[850px]">
            <header class="p-6 border-b border-neutral-300">
                <h1 class="text-3xl font-bold">Início</h1>
            </header>
            <div class="space-y-6 p-6">
                <NewPostCard />
                
                <div v-for="post in props.posts">
                    <PostCard :post="post" />
                </div>
            </div>
        </main>
        <aside class="hidden lg:flex sticky top-0 max-h-screen justify-start w-200 border-l border-neutral-300 bg-neutral-100">
            <div class="max-w-[450px] p-6 w-full">
                <div class="relative mb-6">
                    <i className="fa-solid fa-search absolute left-3 top-6/12 -translate-y-1/2 w-5 h-5 text-neutral-600 text-xl" />
                    <Input class="border-neutral-300 bg-white md:text-xl py-7 pl-12" placeholder="Buscar..."></Input>
                </div>

                <Card class="bg-white mb-6">
                    <div class="flex gap-3 items-center mb-6">
                        <i class="fa-solid fa-arrow-trend-up text-xl text-orange-600"></i>
                        <h5 class="text-2xl font-semibold">Em alta</h5>
                    </div>
                    <div class="">
                        <TrendButton title="Negocios" :counter="15.5"/>
                        <TrendButton title="Tecnologia" :counter="13.5"/>
                        <TrendButton title="Desenvolvimento" :counter="10.5"/>
                    </div>
                </Card>

                <Card class="bg-white">
                    <div class="flex gap-3 items-center mb-10">
                        <i class="fa-solid fa-users text-xl text-orange-600"></i>
                        <h5 class="text-2xl font-semibold">Quem seguir</h5>
                    </div>
                    <div class="space-y-5">
                        <div class="flex justify-between">
                            <div class="flex gap-3">
                                <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="flex flex-col">
                                    <strong>Nome do Usuario</strong>
                                    <p class="text-neutral-600">@do_usuario</p>
                                </div>
                            </div>

                            <Button class="border border-neutral-300 px-5 rounded-full! hover:bg-orange-600 hover:text-white">Seguir</Button>
                        </div>
                        <div class="flex justify-between">
                            <div class="flex gap-3">
                                <div class="bg-blue-200 flex items-center justify-center w-[48px] h-[48px] rounded-full">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="flex flex-col">
                                    <strong>Nome do Usuario</strong>
                                    <p class="text-neutral-600">@do_usuario</p>
                                </div>
                            </div>

                            <Button class="border border-neutral-300 px-5 rounded-full! hover:bg-orange-600 hover:text-white">Seguir</Button>
                        </div>
                    </div>

                </Card>
            </div>
        </aside>
    </div>
</template>