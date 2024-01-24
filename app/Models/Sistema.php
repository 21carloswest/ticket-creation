<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sistema extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->HasMany(Cliente::class);
    }

    public function ticket()
    {
        return $this->HasMany(Ticket::class);
    }

    protected $fillable = [
        'nome',
        'ativo',
        'created_at',
        'updated_at'
    ];
}
