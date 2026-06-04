<template>
    <DashboardLayout titulo="Categorias">
        <form @submit.prevent="salvarCategoria" class="bg-white rounded-[15px] p-8 shadow-sm mb-6">
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
                    {{ categoriaEditando ? 'Atualizar Categoria' : 'Salvar Categoria' }}
                </button>
            </div>
        </form>

        <div class="bg-white rounded-[15px] p-8 shadow-sm">
            <h3 class="text-xl font-semibold mb-6">Categorias cadastradas</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div
                    v-for="categoria in categorias"
                    :key="categoria.id"
                    class="border border-slate-200 rounded-3xl p-5"
                    >
                    <p class="font-semibold">
                        {{ categoria.nome }}
                    </p>

                    <span
                        class="text-sm"
                        :class="categoria.tipo === 'receita'
                            ? 'text-emerald-600'
                            : 'text-red-500'"
                            >
                        {{ categoria.tipo }}
                    </span>

                    <div class="mt-4 flex gap-2">
                        <button
                            @click="editarCategoria(categoria)"
                            class="text-sm px-3 py-2 rounded-xl bg-slate-100 text-slate-700 border border-slate-300"
                        >
                            Editar
                        </button>

                        <button
                            @click="excluirCategoria(categoria.id)"
                            class="text-sm px-3 py-2 rounded-xl bg-red-50 text-red-600 border border-red-200"
                        >
                            Excluir
                        </button>
                    </div>

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
const categoriaEditando = ref(null);

const form = reactive({
    nome: '',
    tipo: '',
});

async function carregarCategorias() {
    const response = await CategoriaService.listar();

    categorias.value = response.data;
}

function editarCategoria(categoria) {
    categoriaEditando.value = categoria.id;

    form.nome = categoria.nome;
    form.tipo = categoria.tipo;
}

async function salvarCategoria() {
    if (categoriaEditando.value) {
        await CategoriaService.atualizar(categoriaEditando.value, form);
    } else {
        await CategoriaService.criar(form);
    }

    form.nome = '';
    form.tipo = '';
    categoriaEditando.value = null;

    await carregarCategorias();
}

async function excluirCategoria(id) {
    if (!confirm('Deseja excluir esta categoria?')) {
        return;
    }

    await CategoriaService.excluir(id);

    await carregarCategorias();
}

onMounted(() => {
    carregarCategorias();
});
</script>
