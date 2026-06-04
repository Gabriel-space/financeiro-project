<?php

namespace App\Http\Controllers\Api;

use App\Actions\Despesas\AtualizarDespesaAction;
use App\Actions\Despesas\CriarDespesaAction;
use App\Actions\Despesas\ExcluirDespesaAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\DespesaRequest;
use App\Models\Despesa;

class DespesaController extends Controller
{
    public function index()
    {
        return Despesa::with('categoria')
            ->latest()
            ->get();
    }

    public function store(DespesaRequest $request, CriarDespesaAction $action)
    {
        $despesa = $action->execute($request->validated());

        return response()->json([
            'message' => 'Despesa criada com sucesso',
            'data' => $despesa->load('categoria'),
        ], 201);
    }

    public function update(
        DespesaRequest $request,
        Despesa $despesa,
        AtualizarDespesaAction $action
    ) {
        $despesa = $action->execute($despesa, $request->validated());

        return response()->json([
            'message' => 'Despesa atualizada com sucesso',
            'data' => $despesa->load('categoria'),
        ]);
    }

    public function destroy(Despesa $despesa, ExcluirDespesaAction $action)
    {
        $action->execute($despesa);

        return response()->json([
            'message' => 'Despesa excluída com sucesso',
        ]);
    }
}
