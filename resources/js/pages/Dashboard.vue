<template>
    <DashboardLayout titulo="Dashboard">

        <div class="flex justify-end mb-6">
            <button
                @click="gerarPdf"
                class="flex items-center gap-2 bg-slate-900 text-white px-5 py-3 rounded-2xl font-semibold hover:opacity-90">
                <FileText :size="18" />
                Gerar PDF
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-[15px] shadow-md">
                <p class="text-slate-500 text-sm">Receitas</p>
                <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                    {{ formatarMoeda(resumo.total_receitas) }}
                </h2>
            </div>

            <div class="bg-white p-7 rounded-[15px] shadow-md">
                <p class="text-slate-500 text-sm">Despesas</p>
                <h2 class="text-3xl font-bold text-red-500 mt-2">
                    {{ formatarMoeda(resumo.total_despesas) }}
                </h2>
            </div>

            <div class="bg-white p-7 rounded-[15px] shadow-md">
                <p class="text-slate-500 text-sm">Saldo Atual</p>
                <h2 class="text-3xl font-bold text-slate-800 mt-2">
                    {{ formatarMoeda(resumo.saldo) }}
                </h2>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-7 rounded-[15px] shadow-md">
                <h3 class="text-xl font-semibold mb-4">Últimas receitas</h3>

                <div v-for="receita in resumo.ultimas_receitas" :key="receita.id" class="border-b py-3">
                    <p class="font-medium">{{ receita.descricao }}</p>
                    <p class="text-sm text-slate-500">{{ receita.categoria?.nome }}</p>
                    <p class="text-emerald-600 font-semibold">
                        {{ formatarMoeda(receita.valor) }}
                    </p>
                </div>
            </div>

            <div class="bg-white p-7 rounded-[15px] shadow-md">
                <h3 class="text-xl font-semibold mb-4">Últimas despesas</h3>

                <div v-for="despesa in resumo.ultimas_despesas" :key="despesa.id" class="border-b py-3">
                    <p class="font-medium">{{ despesa.descricao }}</p>
                    <p class="text-sm text-slate-500">{{ despesa.categoria?.nome }}</p>
                    <p class="text-red-500 font-semibold">
                        {{ formatarMoeda(despesa.valor) }}
                    </p>
                </div>
            </div>
        </div>
    </DashboardLayout>
</template>

<script setup>
import { onMounted, reactive } from 'vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import DashboardService from '../services/DashboardService';
import { FileText } from 'lucide-vue-next';


const resumo = reactive({
    total_receitas: 0,
    total_despesas: 0,
    saldo: 0,
    ultimas_receitas: [],
    ultimas_despesas: [],
});

async function carregarResumo() {
    const response = await DashboardService.buscarResumo();

    resumo.total_receitas = response.data.total_receitas;
    resumo.total_despesas = response.data.total_despesas;
    resumo.saldo = response.data.saldo;
    resumo.ultimas_receitas = response.data.ultimas_receitas;
    resumo.ultimas_despesas = response.data.ultimas_despesas;
}

function formatarMoeda(valor) {
    return Number(valor).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });
}

function gerarPdf() {
    window.open(
        '/api/relatorios/financeiro',
        '_blank'
    );
}

onMounted(() => {
    carregarResumo();
});
</script>
