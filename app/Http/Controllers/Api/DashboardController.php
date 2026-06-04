<?php

namespace App\Http\Controllers\Api;

use App\Actions\Dashboard\BuscarResumoDashboardAction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(
        BuscarResumoDashboardAction $action
    ) {
        return response()->json(
            $action->execute()
        );
    }
}
