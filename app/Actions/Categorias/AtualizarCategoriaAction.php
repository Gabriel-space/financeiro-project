<?php

namespace App\Actions\Categorias;

use App\Models\Categoria;

class AtualizarCategoriaAction
{
    public function execute(Categoria $categoria, array $dados): Categoria
    {
        $categoria->update([
            'nome' => $dados['nome'],
            'tipo' => $dados['tipo'],
        ]);

        return $categoria;
    }
}
