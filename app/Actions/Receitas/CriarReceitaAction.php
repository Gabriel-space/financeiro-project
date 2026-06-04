<?php

namespace App\Actions\Receitas;

use App\Models\Receita;

class CriarReceitaAction
{
    public function execute(array $dados): Receita
    {
        return Receita::create($dados);
    }
}
