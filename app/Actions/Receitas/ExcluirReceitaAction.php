<?php

namespace App\Actions\Receitas;

use App\Models\Receita;

class ExcluirReceitaAction
{
    public function execute(Receita $receita): void
    {
        $receita->delete();
    }
}
