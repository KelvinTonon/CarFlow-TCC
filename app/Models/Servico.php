<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'nome_servico',
        'descricao',
        'preco',
        'duracao_estimada'
    ];

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
