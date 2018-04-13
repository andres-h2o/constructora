<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'puestos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nro', 'largo', 'ancho', 'latitud', 'longitud', 'estado', 'id_bloque', 'id_categoria'];

    
}
