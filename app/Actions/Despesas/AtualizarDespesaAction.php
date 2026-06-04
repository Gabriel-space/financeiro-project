<?php

namespace App\Actions\Despesas;

use App\Models\Despesa;

class AtualizarDespesaAction
{
    public function execute(Despesa $despesa, array $dados): Despesa
    {
        $despesa->update($dados);

        return $despesa;
    }
}
