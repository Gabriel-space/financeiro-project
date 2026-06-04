<template>
    <div class="min-h-screen bg-violet-200 flex">
        <aside class="w-72 bg-slate-900 text-white">
            <div class="p-6 border-b border-indigo-700">
                <h1 class="text-2xl font-bold">Controle-Financeiro</h1>
                <p class="text-sm text-indigo-400">Controle pessoal financeiro</p>
            </div>

            <nav class="p-4 space-y-2">
                <router-link class="menu-link" to="/dashboard">Dashboard</router-link>
                <router-link class="menu-link" to="/receitas">Receitas</router-link>
                <router-link class="menu-link" to="/despesas">Despesas</router-link>
                <router-link class="menu-link" to="/categorias">Categorias</router-link>
            </nav>
        </aside>

        <main class="flex-1">
            <header class="bg-white border-b border-slate-200 px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-slate-800">
                        {{ titulo }}
                    </h2>

                    <p class="text-sm text-slate-500">
                        painel
                    </p>
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
defineProps({
    titulo: {
        type: String,
        default: 'Painel',
    },
});
</script>

<style scoped>
.menu-link {
    display: block;
    padding: 12px 16px;
    border-radius: 12px;
    color: #cbd5e1;
}

.menu-link:hover {
    background: rgb(8, 5, 27);
    color: white;
}

.router-link-active {
    background: #059669;
    color: white;
}
</style>
