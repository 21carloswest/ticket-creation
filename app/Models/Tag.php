<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_tag',
        'ativo'
    ];

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }
}
