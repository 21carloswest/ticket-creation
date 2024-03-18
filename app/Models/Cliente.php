<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'sistema_id',
        'cliente_nome',
        'empresa',
        'email',
        'telefone',
        'celular',
        'link',
        'cnpj',
        'codigo_cliente',
        'ativo'
    ];

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
