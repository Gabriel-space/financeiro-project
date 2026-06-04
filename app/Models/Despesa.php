<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Despesa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'categoria_id',
        'descricao',
        'valor',
        'data_pagamento',
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
