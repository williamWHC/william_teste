<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    protected $fillable = ['valor','motorista_id', 'passageiro_id'];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'motorista_id');
    }

    public function Passenger()
    {
        return $this->belongsTo(Passenger::class, 'passageiro_id');
    }
}
