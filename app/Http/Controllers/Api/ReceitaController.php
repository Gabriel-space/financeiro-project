<?php

namespace App\Http\Controllers\Api;

use App\Actions\Receitas\AtualizarReceitaAction;
use App\Actions\Receitas\CriarReceitaAction;
use App\Actions\Receitas\ExcluirReceitaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceitaRequest;
use App\Models\Receita;

class ReceitaController extends Controller
{
    public function index()
    {
        return Receita::with('categoria')
            ->latest()
            ->get();
    }

    public function store(ReceitaRequest $request, CriarReceitaAction $action)
    {
        $receita = $action->execute($request->validated());

        return response()->json([
            'message' => 'Receita criada com sucesso',
            'data' => $receita->load('categoria'),
        ], 201);
    }

    public function update(
        ReceitaRequest $request,
        Receita $receita,
        AtualizarReceitaAction $action
    ) {
        $receita = $action->execute($receita, $request->validated());

        return response()->json([
            'message' => 'Receita atualizada com sucesso',
            'data' => $receita->load('categoria'),
        ]);
    }

    public function destroy(Receita $receita, ExcluirReceitaAction $action)
    {
        $action->execute($receita);

        return response()->json([
            'message' => 'Receita excluída com sucesso',
        ]);
    }
}
