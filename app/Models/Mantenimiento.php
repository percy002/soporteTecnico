<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Equipo;

class Mantenimiento extends Model
{
    use HasFactory;

    

    public function usuario()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function responsable_equipo()
    {
        return $this->belongsTo(Responsable_Equipo::class,'responsable_equipo_id');
    }
}

