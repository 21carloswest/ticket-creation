<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $fillable = [
        'titulo',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function descricao()
    {
        return $this->hasMany(Descricao::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
