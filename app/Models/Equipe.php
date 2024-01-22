<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ativo',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
