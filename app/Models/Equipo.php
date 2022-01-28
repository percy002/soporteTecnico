<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    /**
     * Get the responsable that owns the Equipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /**
     * The responsables that belong to the Equipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
   
    
}
