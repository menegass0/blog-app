<script setup>
    import { Link, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue';

    const page = usePage();

    const user = computed(() => page.props.auth.user)
</script>


<template>
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
                        <strong>{{ user.name }}</strong>
                        <p>@{{ user.slug }}</p>
                    </div>
                </div>
                <Link href="/logout" class="w-full flex gap-3 p-3 items-center hover:bg-neutral-200 hover:text-red-500 rounded-lg">
                    <i class=" fa-solid fa-arrow-right-from-bracket"></i>
                    <p class="hidden lg:block">Sair</p>
                </Link>
            </div>
        </div>
    </aside>
</template>