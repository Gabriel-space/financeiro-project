<template>
    <DashboardLayout titulo="Despesas">
        <div class="bg-white rounded-[12px] p-8 shadow-sm mb-6">
            <h3 class="text-xl font-semibold mb-6">Nova Despesa</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input class="border border-slate-200 rounded-2xl px-4 py-3" placeholder="Descrição">

                <input type="number" class="border border-slate-200 rounded-2xl px-4 py-3" placeholder="Valor">

                <input type="date" class="border border-slate-200 rounded-2xl px-4 py-3">

                <button class="bg-red-500 text-white rounded-2xl py-3 font-semibold">
                    Salvar Despesa
                </button>
            </div>
        </div>

        <div class="bg-white rounded-[12px] p-8 shadow-sm">
            <h3 class="text-xl font-semibold mb-6">Despesas cadastradas</h3>

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
                        <td class="py-4">Mercado</td>
                        <td>04/06/2026</td>
                        <td class="text-red-500 font-semibold">R$ 250,00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
</script>
