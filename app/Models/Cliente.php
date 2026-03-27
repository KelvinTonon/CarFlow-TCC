<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco'
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    } 
}
