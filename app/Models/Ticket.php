<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function interacao()
    {
        return $this->hasMany(Interacao::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }
}
