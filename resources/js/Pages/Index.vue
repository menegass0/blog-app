<script setup>
    import { Link } from '@inertiajs/vue3';
    import CardIndexInfo from '../components/cards/CardIndexInfo.vue';
    import Footer from '../components/Footer.vue';

</script>

<template >
    <section class="bg-neutral-100">
        <div class="container py-20 px-6 mx-auto " >
            <nav class="flex justify-between mb-20">
                <div class="flex items-center gap-3">
                    <div class="text-center flex items-center justify-center rounded-lg p-3 h-10 w-10 gradient-bg">
                        <i class="fas fa-eye text-white"></i>
                    </div>
                    <h2 class="text-3xl font-bold">Conecta</h2>
                </div>

                <div class="flex gap-3 items-center">
                    <Link class="btn py-2 px-5 font-semibold bg-white">Entrar</Link>
                    <Link :href="route('signup.index')" class="btn gradient-bg px-5 py-2 whitespace-nowrap rounded-lg text-white font-semibold">Comece Agora <i class="ms-3 fas fa-arrow-right"></i></Link>
                </div>
            </nav>

            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-6xl md:text-7xl font-bold mb-6">Sua nova forma de <span class="gradient-text">se conectar</span></h1>
                <p class="text-xl mx-auto max-w-2xl text-muted mb-10">Uma rede social moderna onde você pode compartilhar suas ideias, descobrir conteúdos incriveis e construir conexões significativas</p>
                <div class="flex justify-center gap-4 text-xl">
                    <Link :href="route('signup.index')" class="btn gradient-bg px-5 py-2 whitespace-nowrap rounded-lg text-white font-semibold">Comece Agora <i class="ms-3 fas fa-arrow-right"></i></Link>
                    <Link class="btn py-2 px-5 font-semibold bg-white">já tenho conta</Link>
                </div>
            </div>
        </div>
    </section>
    

    <section class="bg-neutral-100">
        <div class="container  px-6 py-20 mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <CardIndexInfo class="teste" icon="fas fa-users" title="Conecte-se" desc="Encontre pessoas com interesses em comum"/>
                <CardIndexInfo class="teste" icon="fa-regular fa-comments" title="Conecte-se" desc="Compartilhe ideias e histórias"/>
                <CardIndexInfo class="teste" icon="fa-regular fa-heart" title="Conecte-se" desc="Curta, comente e republicar conteúdos"/>
            </div>
        </div>
    </section>


    <Footer />
</template>