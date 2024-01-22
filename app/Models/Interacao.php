<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interacao extends Model
{
    use HasFactory;

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
