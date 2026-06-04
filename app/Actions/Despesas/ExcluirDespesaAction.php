<?php

namespace App\Actions\Despesas;

use App\Models\Despesa;

class ExcluirDespesaAction
{
    public function execute(Despesa $despesa): void
    {
        $despesa->delete();
    }
}
