<?php

namespace App\Http\Controllers\Api;

use App\Actions\Categorias\CriarCategoriaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\Actions\Categorias\AtualizarCategoriaAction;
use App\Actions\Categorias\ExcluirCategoriaAction;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::orderBy('nome')->get();
    }

    public function store(
        CategoriaRequest $request,
        CriarCategoriaAction $action
    ) {
        $categoria = $action->execute(
            $request->validated()
        );

        return response()->json([
            'message' => 'Categoria criada com sucesso',
            'data' => $categoria,
        ], 201);
    }

    public function update(
        CategoriaRequest $request,
        Categoria $categoria,
        AtualizarCategoriaAction $action
    ) {
        $categoria = $action->execute(
            $categoria,
            $request->validated()
        );

        return response()->json([
            'message' => 'Categoria atualizada com sucesso',
            'data' => $categoria,
        ]);
    }

    public function destroy(
        Categoria $categoria,
        ExcluirCategoriaAction $action
    ) {
        $action->execute($categoria);

        return response()->json([
            'message' => 'Categoria excluída com sucesso',
        ]);
    }
}
