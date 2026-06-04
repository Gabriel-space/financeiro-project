<?php

namespace App\Actions\Dashboard;

use App\Models\Despesa;
use App\Models\Receita;

class BuscarResumoDashboardAction
{
    public function execute(): array
    {
        $totalReceitas = Receita::sum('valor');

        $totalDespesas = Despesa::sum('valor');

        $saldo = $totalReceitas - $totalDespesas;

        $ultimasReceitas = Receita::with('categoria')
            ->latest()
            ->take(5)
            ->get();

        $ultimasDespesas = Despesa::with('categoria')
            ->latest()
            ->take(5)
            ->get();

        return [
            'total_receitas' => $totalReceitas,
            'total_despesas' => $totalDespesas,
            'saldo' => $saldo,
            'ultimas_receitas' => $ultimasReceitas,
            'ultimas_despesas' => $ultimasDespesas,
        ];
    }
}
