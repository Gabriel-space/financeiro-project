<template>
    <DashboardLayout titulo="Despesas">
        <form @submit.prevent="salvarDespesa" class="bg-white rounded-[15px] p-8 shadow-sm mb-6">
            <h3 class="text-xl font-semibold mb-6">
                {{ despesaEditando ? 'Editar Despesa' : 'Nova Despesa' }}
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input
                    v-model="form.descricao"
                    type="text"
                    placeholder="Descrição"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <input
                    v-model="form.valor"
                    type="number"
                    step="0.01"
                    placeholder="Valor"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <select
                    v-model="form.categoria_id"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >
                    <option value="">Selecione uma categoria</option>

                    <option
                        v-for="categoria in categoriasDespesa"
                        :key="categoria.id"
                        :value="categoria.id"
                    >
                        {{ categoria.nome }}
                    </option>
                </select>

                <input
                    v-model="form.data_pagamento"
                    type="date"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <button
                    type="submit"
                    class="md:col-span-2 bg-red-700 text-white rounded-2xl py-3 font-semibold"
                >
                    {{ despesaEditando ? 'Atualizar Despesa' : 'Salvar Despesa' }}
                </button>
            </div>
        </form>

        <div class="bg-white rounded-[15px] p-8 shadow-sm">
            <h3 class="text-xl font-semibold mb-6">
                Despesas cadastradas
            </h3>

            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-slate-500">
                        <th class="text-left py-3">Descrição</th>
                        <th class="text-left">Categoria</th>
                        <th class="text-left">Data</th>
                        <th class="text-left">Valor</th>
                        <th class="text-left">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="despesa in despesas"
                        :key="despesa.id"
                        class="border-b"
                    >
                        <td class="py-4">{{ despesa.descricao }}</td>
                        <td>{{ despesa.categoria?.nome }}</td>
                        <td>{{ formatarData(despesa.data_pagamento) }}</td>

                        <td class="text-red-500 font-semibold">
                            {{ formatarMoeda(despesa.valor) }}
                        </td>

                        <td>
                            <div class="flex gap-2">
                                <button
                                    @click="editarDespesa(despesa)"
                                    class="px-3 py-2 rounded-xl bg-slate-100 text-slate-700 border border-slate-300"
                                >
                                    Editar
                                </button>

                                <button
                                    @click="excluirDespesa(despesa.id)"
                                    class="px-3 py-2 rounded-xl bg-red-50 text-red-600 border border-red-300"
                                >
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { computed, onMounted, reactive, ref } from 'vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import DespesaService from '../services/DespesaService';
import CategoriaService from '../services/CategoriaService';

const despesas = ref([]);
const categorias = ref([]);
const despesaEditando = ref(null);

const form = reactive({
    descricao: '',
    valor: '',
    categoria_id: '',
    data_pagamento: '',
});

const categoriasDespesa = computed(() => {
    return categorias.value.filter(
        categoria => categoria.tipo === 'despesa'
    );
});

async function carregarDespesas() {
    const response = await DespesaService.listar();

    despesas.value = response.data;
}

async function carregarCategorias() {
    const response = await CategoriaService.listar();

    categorias.value = response.data;
}

async function salvarDespesa() {
    if (despesaEditando.value) {
        await DespesaService.atualizar(despesaEditando.value, form);
    } else {
        await DespesaService.criar(form);
    }

    limparFormulario();

    await carregarDespesas();
}

function editarDespesa(despesa) {
    despesaEditando.value = despesa.id;

    form.descricao = despesa.descricao;
    form.valor = despesa.valor;
    form.categoria_id = despesa.categoria_id;
    form.data_pagamento = despesa.data_pagamento;
}

async function excluirDespesa(id) {
    if (!confirm('Deseja excluir esta despesa?')) {
        return;
    }

    await DespesaService.excluir(id);

    await carregarDespesas();
}

function limparFormulario() {
    form.descricao = '';
    form.valor = '';
    form.categoria_id = '';
    form.data_pagamento = '';
    despesaEditando.value = null;
}

function formatarMoeda(valor) {
    return Number(valor).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });
}

function formatarData(data) {
    return new Date(data + 'T00:00:00').toLocaleDateString('pt-BR');
}

onMounted(async () => {
    await carregarCategorias();
    await carregarDespesas();
});
</script>
