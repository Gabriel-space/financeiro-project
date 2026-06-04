<?php

namespace App\Actions\Despesas;

use App\Models\Despesa;

class CriarDespesaAction
{
    public function execute(array $dados): Despesa
    {
        return Despesa::create($dados);
    }
}
