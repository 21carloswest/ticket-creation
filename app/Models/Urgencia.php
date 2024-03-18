<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_urgencia',
        'ativo'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
