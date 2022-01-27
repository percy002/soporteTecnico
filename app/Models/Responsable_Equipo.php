<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable_Equipo extends Model
{
    use HasFactory;
    protected $table="responsable_equipos";

    public function equipo()
    {
        return $this->hasOne(Equipo::class, 'id');
    }

    public function responsable()
    {
        return $this->hasOne(Responsable::class, 'id');
    }
}
