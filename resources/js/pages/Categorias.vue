<template>
    <DashboardLayout titulo="Categorias">
        <form @submit.prevent="salvarCategoria" class="bg-white rounded-[28px] p-8 shadow-sm mb-6">
            <h3 class="text-xl font-semibold mb-6">Nova Categoria</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input
                    v-model="form.nome"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                    placeholder="Nome"
                >

                <select
                    v-model="form.tipo"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >
                    <option value="">Selecione o tipo</option>
                    <option value="receita">Receita</option>
                    <option value="despesa">Despesa</option>
                </select>

                <button
                    type="submit"
                    class="bg-slate-900 text-white rounded-2xl py-3 font-semibold"
                >
                    Salvar Categoria
                </button>
            </div>
        </form>

        <div class="bg-white rounded-[28px] p-8 shadow-sm">
            <h3 class="text-xl font-semibold mb-6">Categorias cadastradas</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    class="border border-slate-200 rounded-3xl p-5"
                >
                    <p class="font-semibold">{{ categoria.nome }}</p>

                    <span
                        class="text-sm"
                        :class="categoria.tipo === 'receita' ? 'text-emerald-600' : 'text-red-500'"
                    >
                        {{ categoria.tipo }}
                    </span>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { onMounted, reactive, ref } from 'vue';
import CategoriaService from '../services/CategoriaService';
import DashboardLayout from '../layouts/DashboardLayout.vue';

const categorias = ref([]);

const form = reactive({
    nome: '',
    tipo: '',
});

async function carregarCategorias() {
    const response = await CategoriaService.listar();

    categorias.value = response.data;
}

async function salvarCategoria() {
    await CategoriaService.criar(form);

    form.nome = '';
    form.tipo = '';

    await carregarCategorias();
}

onMounted(() => {
    carregarCategorias();
});
</script>
