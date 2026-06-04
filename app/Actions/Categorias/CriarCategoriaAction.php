<?php

namespace App\Actions\Categorias;

use App\Models\Categoria;

class CriarCategoriaAction
{
    public function execute(array $dados): Categoria
    {
        return Categoria::create([
            'nome' => $dados['nome'],
            'tipo' => $dados['tipo'],
        ]);
    }
}
