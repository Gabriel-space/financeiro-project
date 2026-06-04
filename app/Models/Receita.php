<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable = [
        'categoria_id',
        'descricao',
        'valor',
        'data_recebimento',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
