<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Equipo;

class Mantenimiento extends Model
{
    use HasFactory;

    public function equipo()
    {
        return $this->hasOne(Equipo::class,'id');
    }

    public function usuario()
    {
        return $this->hasOne(User::class,'id');
    }
}

