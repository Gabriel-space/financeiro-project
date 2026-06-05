<template>
    <div class="min-h-screen bg-zinc-200 flex">
        <aside
            :class="[
                    'bg-white text-white transition-all duration-300',
                    menuAberto ? 'w-64' : 'w-20'
                ]">
            <div class="p-4 border-b border-slate-400">
                    <div v-if="menuAberto">
                        <img :src="logo" alt="Logo" class="w-80">
                        <br>
                        <h1 class=" text-lg font-bold text-slate-800">Controle-Financeiro</h1>
                </div>
            </div>

            <nav class="p-4 space-y-2 bg-white">
                <router-link class="menu-link text-slate-800" to="/dashboard">
                    <LayoutDashboard :size="20" />
                    <span v-if="menuAberto" class="font-semibold">Dashboard</span>
                </router-link>

                <router-link class="menu-link text-slate-800" to="/receitas">
                    <Wallet :size="20" />
                    <span v-if="menuAberto" class="font-semibold">Receitas</span>
                </router-link>

                <router-link class="menu-link text-slate-800" to="/despesas">
                    <Receipt :size="20" />
                    <span v-if="menuAberto" class="font-semibold">Despesas</span>
                </router-link>

                <router-link class="menu-link text-slate-800" to="/categorias">
                    <Tags :size="20" />
                    <span v-if="menuAberto" class="font-semibold">Categorias</span>
                </router-link>
            </nav>
        </aside>

        <div
            v-if="menuAberto"
            @click="menuAberto = false"
            class="fixed inset-0 bg-black/40 z-30 md:hidden"
        ></div>

        <main class="flex-1">
            <header class="bg-slate-900 border-b border-slate-200 px-6 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <button
                        @click="menuAberto = !menuAberto"
                        class="p-2 rounded-xl bg-slate-800 text-slate-300"
                    >
                        <Menu :size="18" />
                    </button>

                    <div>
                        <h2 class="text-xl font-semibold text-white">
                            {{ titulo }}
                        </h2>

                        <p class="text-sm text-slate-500">
                            Bem-vindo
                        </p>
                    </div>
                </div>

                <router-link to="/" class="text-sm text-red-500 hover:underline">
                    Sair
                </router-link>
            </header>

            <section class="p-6">
                <slot />
            </section>
        </main>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import logo from '../assets/logo-financontrol.png';

import {
    Menu,
    LayoutDashboard,
    Wallet,
    Receipt,
    Tags
} from 'lucide-vue-next';

defineProps({
    titulo: {
        type: String,
        default: 'Painel',
    },
});

const menuAberto = ref(true);
</script>

<style scoped>
.menu-link {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 12px 16px;
    border-radius: 12px;

    transition: all .2s ease;
}

.menu-link:hover {
    background: #1e293b;
    color: white;
}

.router-link-active {
    background: #217359;
    color: white;
}
</style>
