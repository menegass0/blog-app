<script setup lang="ts">
    import { Form, Link, useForm } from '@inertiajs/vue3';
    import Input from '../components/ui/Input.vue';
    import { ref } from 'vue';
    import { LoginForm } from '../services/auth/login';
    import Button from '../components/ui/Button.vue';
    import FormErrors from '../components/ui/FormErrors.vue';

    const formData = useForm<LoginForm>({
        email: null,
        password: null
    })

    const form = ref();

    const submitForm = () => {
        formData.post(route('login.store'), {
            onError: () => {
                formData.reset('password')
            }
        })
    }

</script>

<template>
    <div class="min-h-screen flex">
        <div class="hidden w-1/2 lg:flex items-center justify-center gradient-bg p-12">
            <div class="text-white w-full max-w-xl">
                <i class="text-7xl fa-regular fa-star mb-8"></i>
                <h1 class="text-6xl font-semibold mb-8">Conecte-se com quem importa</h1>
                <p class="text-lg opacity-90">Compartilhe momentos, descubra histórias e faça parte de uma comunidade vibrante.</p>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-neutral-100">
            <div class="w-full max-w-md">
                <div class="text-center mb-6">
                    <h3 class="text-3xl font-semibold mb-3">Crie Sua Conta</h3>
                    <p class="text-muted-foreground">Junte-se à nossa comunidade hoje</p>   
                    <p></p>
                </div>

                <div v-if="formData.errors.email">
                    <FormErrors class="mb-6 items-normal" >
                        <ul>
                            <li class="list-disc ms-3" v-for="(value, key, index) in formData.errors" :key="key">
                                {{ value }}
                            </li>
                        </ul>
                    </FormErrors>
                </div>
                
                <Form method="POST" :action="route('login.store')" :ref="form" @submit.prevent="submitForm" class="flex flex-col space-y-5">

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Email</label>
                        <div class="relative">
                            <i className="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" type="email" v-model="formData.email" name="email" placeholder="seu@email.com"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Senha</label>
                        <div class="relative">
                            <i className="fa-regular fa-envelope absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" type="password" v-model="formData.password" placeholder="minimo 8 caracteres"></Input>
                        </div>
                    </div>

                    <Button class="gradient-bg text-white mt-2 gap-3 ">
                        Entrar
                        <i class="fas fa-arrow-right"></i>
                    </Button>
                        
                   
                    <p class="text-center">Não tem uma conta? <Link :href="route('signup.index')" class="gradient-text hover:underline hover:decoration-orange-600 ">Cadastre-se</Link></p>
                </Form>
            </div> 
        </div>
        
    </div>
</template>