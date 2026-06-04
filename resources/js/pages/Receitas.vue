<template>
    <DashboardLayout titulo="Receitas">

        <div class="bg-white rounded-[28px] p-8 shadow-sm mb-6">
            <h3 class="text-xl font-semibold mb-6">
                Nova Receita
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <input
                    type="text"
                    placeholder="Descrição"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <input
                    type="number"
                    placeholder="Valor"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <input
                    type="date"
                    class="border border-slate-200 rounded-2xl px-4 py-3"
                >

                <button
                    class="bg-emerald-600 text-white rounded-2xl py-3 font-semibold"
                >
                    Salvar Receita
                </button>

            </div>
        </div>

        <div class="bg-white rounded-[28px] p-8 shadow-sm">

            <h3 class="text-xl font-semibold mb-6">
                Receitas cadastradas
            </h3>

            <table class="w-full">

                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3">Descrição</th>
                        <th class="text-left">Data</th>
                        <th class="text-left">Valor</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="py-4">Salário</td>
                        <td>04/06/2026</td>
                        <td class="text-emerald-600 font-semibold">
                            R$ 3.000,00
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>

    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
</script>
