<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_equipe',
        'ativo',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
