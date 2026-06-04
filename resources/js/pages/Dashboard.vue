<template>
    <DashboardLayout>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-7 rounded-[15px] shadow-md shadow-slate-black-200">
                <p class="text-slate-500 text-sm">Receitas</p>
                <h2 class="text-3xl font-bold text-emerald-600 mt-2">
                    R$ 3.500,00
                </h2>
            </div>

            <div class="bg-white p-7 rounded-[15px] shadow-md shadow-slate-black-200">
                <p class="text-slate-500 text-sm">Despesas</p>
                <h2 class="text-3xl font-bold text-red-500 mt-2">
                    R$ 1.250,00
                </h2>
            </div>

            <div class="bg-white p-7 rounded-[15px] shadow-md shadow-slate-black-200">
                <p class="text-slate-500 text-sm">Saldo Atual</p>
                <h2 class="text-3xl font-bold text-slate-800 mt-2">
                    R$ 2.250,00
                </h2>
            </div>
        </div>

        <div class="mt-8 bg-white p-7 rounded-[15px] shadow-md shadow-slate-black-200">
            <h3 class="text-xl font-semibold mb-4">
                Últimos lançamentos
            </h3>

            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-slate-500">
                        <th class="text-left py-3">Descrição</th>
                        <th class="text-left">Tipo</th>
                        <th class="text-left">Valor</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="border-b">
                        <td class="py-3">Salário</td>
                        <td>Receita</td>
                        <td class="text-emerald-600 font-semibold">
                            R$ 3.000,00
                        </td>
                    </tr>

                    <tr>
                        <td class="py-3">Mercado</td>
                        <td>Despesa</td>
                        <td class="text-red-500 font-semibold">
                            R$ 250,00
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
