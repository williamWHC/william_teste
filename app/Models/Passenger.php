<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $fillable = ['nome', 'sexo', 'nascimento', 'cpf'];
}
