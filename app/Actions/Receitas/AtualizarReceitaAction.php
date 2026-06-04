<?php

namespace App\Actions\Receitas;

use App\Models\Receita;

class AtualizarReceitaAction
{
    public function execute(Receita $receita, array $dados): Receita
    {
        $receita->update($dados);

        return $receita;
    }
}
