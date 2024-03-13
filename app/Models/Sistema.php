<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_sistema',
        'ativo'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
