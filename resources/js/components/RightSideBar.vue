<script setup>
    import { Link } from '@inertiajs/vue3';
    import Input from '../components/ui/Input.vue'
    import Card from '../components/cards/Card.vue';
    import TrendButton from '../components/buttons/TrendButton.vue'
    import Button from '../components/ui/Button.vue';
</script>


<template>
    <aside class="hidden lg:flex sticky top-0 max-h-screen justify-start w-200 border-l border-neutral-300 bg-white">
        <div class="max-w-[450px] p-6 w-full">
            <div class="relative mb-6">
                <i className="fa-solid fa-search absolute left-3 top-6/12 -translate-y-1/2 w-5 h-5 text-neutral-600 text-xl" />
                <Input class="border-neutral-300 bg-white md:text-xl py-7 pl-12" placeholder="Buscar..."></Input>
            </div>

            <Card class="bg-white shadow-none! border border-neutral-300 mb-6">
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

            <Card class="bg-white shadow-none border border-neutral-300">
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
</template>