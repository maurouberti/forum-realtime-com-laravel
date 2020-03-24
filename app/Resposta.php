<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{

    protected $fillable = ['highlighted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topico()
    {
        return $this->belongsTo(Topico::class);
    } 
}
