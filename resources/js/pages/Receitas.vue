<template>
    <DashboardLayout titulo="Receitas">
        <form @submit.prevent="salvarReceita" class="bg-white rounded-[15px] p-8 shadow-sm mb-6">
            <h3 class="text-xl font-semibold mb-6">
                {{ receitaEditando ? 'Editar Receita' : 'Nova Receita' }}
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
                        v-for="categoria in categoriasReceita"
                        :key="categoria.id"
                        :value="categoria.id"
                    >
                        {{ categoria.nome }}
                    </option>
                </select>

                <input
                    v-model="form.data_recebimento"
                    type="date"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <button
                    type="submit"
                    class="md:col-span-2 bg-emerald-700 text-white rounded-2xl py-3 font-semibold"
                >
                    {{ receitaEditando ? 'Atualizar Receita' : 'Salvar Receita' }}
                </button>
            </div>
        </form>

        <div class="bg-white rounded-[15px] p-8 shadow-sm">
            <h3 class="text-xl font-semibold mb-6">
                Receitas cadastradas
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
                        v-for="receita in receitas"
                        :key="receita.id"
                        class="border-b"
                    >
                        <td class="py-4">
                            {{ receita.descricao }}
                        </td>

                        <td>
                            {{ receita.categoria?.nome }}
                        </td>

                        <td>
                            {{ formatarData(receita.data_recebimento) }}
                        </td>

                        <td class="text-emerald-600 font-semibold">
                            {{ formatarMoeda(receita.valor) }}
                        </td>

                        <td>
                            <div class="flex gap-2">
                                <button
                                    @click="editarReceita(receita)"
                                    class="px-3 py-2 rounded-xl bg-slate-100 text-slate-700 border border-slate-300"
                                >
                                    Editar
                                </button>

                                <button
                                    @click="excluirReceita(receita.id)"
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
import ReceitaService from '../services/ReceitaService';
import CategoriaService from '../services/CategoriaService';

const receitas = ref([]);
const categorias = ref([]);
const receitaEditando = ref(null);

const form = reactive({
    descricao: '',
    valor: '',
    categoria_id: '',
    data_recebimento: '',
});

const categoriasReceita = computed(() => {
    return categorias.value.filter(
        categoria => categoria.tipo === 'receita'
    );
});

async function carregarReceitas() {
    const response = await ReceitaService.listar();

    receitas.value = response.data;
}

async function carregarCategorias() {
    const response = await CategoriaService.listar();

    categorias.value = response.data;
}

async function salvarReceita() {
    if (receitaEditando.value) {
        await ReceitaService.atualizar(receitaEditando.value, form);
    } else {
        await ReceitaService.criar(form);
    }

    limparFormulario();

    await carregarReceitas();
}

function editarReceita(receita) {
    receitaEditando.value = receita.id;

    form.descricao = receita.descricao;
    form.valor = receita.valor;
    form.categoria_id = receita.categoria_id;
    form.data_recebimento = receita.data_recebimento;
}

async function excluirReceita(id) {
    if (!confirm('Deseja excluir esta receita?')) {
        return;
    }

    await ReceitaService.excluir(id);

    await carregarReceitas();
}

function limparFormulario() {
    form.descricao = '';
    form.valor = '';
    form.categoria_id = '';
    form.data_recebimento = '';
    receitaEditando.value = null;
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
    await carregarReceitas();
});
</script>
