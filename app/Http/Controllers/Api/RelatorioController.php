<?php

namespace App\Http\Controllers\Api;

use App\Actions\Relatorios\GerarRelatorioFinanceiroAction;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function financeiro(GerarRelatorioFinanceiroAction $action)
    {
        $dados = $action->execute();

        $pdf = Pdf::loadView('pdf.financeiro', $dados);

        return $pdf->download('relatorio-financeiro.pdf');
    }
}
