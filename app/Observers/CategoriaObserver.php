<?php

namespace App\Observers;

use App\Models\Categoria;
use App\Models\LogAtividade;

class CategoriaObserver
{
    public function created(Categoria $categoria): void
    {
        LogAtividade::create([
            'acao' => 'criado',
            'modelo' => 'Categoria',
            'registro_id' => $categoria->id,
            'descricao' => "Categoria criada: {$categoria->nome}",
        ]);
    }

    public function updated(Categoria $categoria): void
    {
        LogAtividade::create([
            'acao' => 'atualizado',
            'modelo' => 'Categoria',
            'registro_id' => $categoria->id,
            'descricao' => "Categoria atualizada: {$categoria->nome}",
        ]);
    }

    public function deleted(Categoria $categoria): void
    {
        LogAtividade::create([
            'acao' => 'excluído',
            'modelo' => 'Categoria',
            'registro_id' => $categoria->id,
            'descricao' => "Categoria excluída: {$categoria->nome}",
        ]);
    }
}
