<template>
    <div class="min-h-screen flex items-center justify-center bg-slate-100 px-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-slate-800">Controle-Financeiro</h1>
                <p class="text-slate-500 mt-2">Controle pessoal financeiro</p>
            </div>

            <form @submit.prevent="entrar" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        E-mail
                    </label>

                    <input
                        type="email"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500"
                        placeholder="exemplo@gmail.com"
                    >
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">
                        Senha
                    </label>

                    <input
                        type="password"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:ring-2 focus:ring-emerald-500"
                        placeholder="Digite sua senha"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-emerald-600 text-white py-3 rounded-xl font-semibold hover:bg-emerald-700 transition"
                >
                    Entrar
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { useRouter } from 'vue-router';

const router = useRouter();

function entrar() {
    router.push('/dashboard');
}
</script>
