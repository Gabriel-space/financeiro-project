<?php

namespace App\Actions\Relatorios;

use App\Models\Despesa;
use App\Models\Receita;

class GerarRelatorioFinanceiroAction
{
    public function execute(): array
    {
        $receitas = Receita::with('categoria')
            ->latest()
            ->get();

        $despesas = Despesa::with('categoria')
            ->latest()
            ->get();

        $totalReceitas = $receitas->sum('valor');
        $totalDespesas = $despesas->sum('valor');

        return [
            'receitas' => $receitas,
            'despesas' => $despesas,
            'totalReceitas' => $totalReceitas,
            'totalDespesas' => $totalDespesas,
            'saldo' => $totalReceitas - $totalDespesas,
            'dataGeracao' => now()->format('d/m/Y H:i'),
        ];
    }
}
