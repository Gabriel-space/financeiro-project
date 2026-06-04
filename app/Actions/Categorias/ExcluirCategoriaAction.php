<?php

namespace App\Actions\Categorias;

use App\Models\Categoria;

class ExcluirCategoriaAction
{
    public function execute(Categoria $categoria): void
    {
        $categoria->delete();
    }
}
