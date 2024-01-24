<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    protected $fillable = [
        'sistema_id',
        'nome',
        'empresa',
        'email',
        'telefone',
        'celular',
        'link',
        'cnpj',
        'codigo',
        'ativo'
    ];
}
