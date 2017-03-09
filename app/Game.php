<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'nom','console','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
