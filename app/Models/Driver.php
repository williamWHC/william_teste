<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['nome', 'sexo', 'nascimento', 'cpf', 'veiculo_id','status'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'veiculo_id');
    }
}
