<script setup lang="ts">
    import { reactive, ref } from 'vue';
    import Input from '../components/ui/Input.vue';
    import Button from '../components/ui/Button.vue';
    import { RegisterForm } from '../services/auth/register';
    import { Form, Link, useForm} from '@inertiajs/vue3';
    import FormErrors from '../components/ui/FormErrors.vue';

    const formData = useForm<RegisterForm>({
        name: null,
        slug: null,
        email: null,
        password: null,
        password_confirmation: null
    })

    const form = ref();

    const submitForm = () => {
        formData.post(route('signup.store'), {
            onError:() => {
                formData.reset('password');
                formData.reset('password_confirmation');
            }
        })
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

                <div v-if="formData.errors.email || formData.errors.password || formData.errors.name || formData.errors.slug || formData.errors.password_confirmation">
                    <FormErrors class="mb-6 items-normal" >
                        <ul>
                            <li class="list-disc ms-3" v-for="(value, key, index) in formData.errors" :key="key">
                                <div v-if="true">
                                    {{ value }}
                                </div>
                                <!-- <li v-else="" v-for="(value2, key2, index2) in value" :key="key">
                                    {{ value2 }}
                                </li> -->
                            </li>
                        </ul>
                    </FormErrors>
                </div>
                
                <Form @submit.prevent="submitForm" :action="route('signup.store')" :ref="form" method="POST" class="flex flex-col space-y-5">
                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Nome de Usuário</label>
                        <div class="relative">
                            <i className="fa-regular fa-user absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.name" name="name" placeholder="Seu nome"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Nick do Perfil</label>
                        <div class="relative">
                            <span class="text-xl absolute left-3 top-3/8 -translate-y-1/2 w-5 h-5">@</span>
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.slug" name="name" placeholder="Seu nick"></Input>
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
                            <i className="fa-solid fa-key absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.password" name="password" type="password" placeholder="minimo 8 caracteres"></Input>
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-2">
                        <label for="" class="text-sm">Confirmação de Senha</label>
                        <div class="relative">
                            <i className="fa-solid fa-key absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-muted-foreground" />
                            <Input class="pl-10 h-12 bg-card border-border" v-model="formData.password_confirmation" name="password_confirmation" type="password" placeholder="Confirme sua Senha"></Input>
                        </div>
                    </div>
                   
                    <Button class="gradient-bg mt-2 gap-3 text-white"  >
                        Criar Conta
                        <i class="fas fa-arrow-right"></i>
                    </Button>

                    <p class="text-center">Já tem uma conta? <Link :href="route('login.index')" class="gradient-text hover:underline hover:decoration-orange-600 ">Entrar</Link></p>
                </Form>
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