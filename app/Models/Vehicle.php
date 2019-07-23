<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['modelo'];

    public function driver()
    {
        return $this->hasMany(Driver::class, 'veiculo_id');
    }
}
