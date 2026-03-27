<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'cliente_id',
        'modelo',
        'marca',
        'placa',
        'cor'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
}
