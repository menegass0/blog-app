<script setup lang="ts">
    import { reactive, ref } from 'vue';
    import Input from '../components/ui/Input.vue';
    import { RegisterForm } from '../services/auth/register';
    import { Link } from '@inertiajs/vue3';

    const formData : RegisterForm = reactive({})

    const form = ref();

    function submit () {
        console.log(formData)
    }

</script>

<template>
    <div class="min-h-screen flex">
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-neutral-100">
            <div class="w-full max-w-md">
                <div class="text-center mb-6">
                    <h3 class="text-3xl font-semibold mb-3">Crie Sua Conta</h3>
                    <p class="text-muted-foreground">Junte-se à nossa comunidade hoje</p>   
                    <p></p>
                </div>
                
                <form @submit.prevent="submit" :ref="form" method="POST" class="flex flex-col space-y-5">
                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Nome Completo</label>
                        <div class="relative">
                            <i className="fa-regular fa-user absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.nome" name="name" placeholder="Seu nome"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Email</label>
                        <div class="relative">
                            <i className="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.email" type="email" name="email" placeholder="seu@email.com"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Senha</label>
                        <div class="relative">
                            <i className="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.password" type="password" placeholder="minimo 8 caracteres"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Confirmação de Senha</label>
                        <div class="relative">
                            <i className="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.confirm_password" type="password" placeholder="Confirme sua Senha"></Input>
                        </div>
                    </div>

                    <button class="my-6 gradient-bg flex gap-3 text-white justify-center items-center py-3 rounded-lg w-full whitespace-nowrap">
                        Criar Conta
                        <i class="fas fa-arrow-right"></i>
                    </button>
                   
                    <p class="text-center">Já tem uma conta? <Link :href="route('login.index')" class="gradient-text hover:underline hover:decoration-orange-600 ">Entrar</Link></p>
                </form>
            </div> 
        </div>
        <div class="hidden w-1/2 lg:flex items-center justify-center gradient-bg p-12">
            <div class="text-white w-full max-w-xl">
                <i class="text-7xl fa-regular fa-heart mb-8"></i>
                <h1 class="text-6xl font-semibold mb-8">Uma nova forma de se conectar</h1>
                <p class="text-lg opacity-90">Descubra pessoas incríveis, compartilhe suas ideias e construa conexões significativas.</p>
            </div>


        </div>
    </div>
</template>