<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vendedors';

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
    protected $fillable = ['nombre', 'telefono', 'direccion', 'estado', 'codigo', 'ci', 'id_grupo'];

    
}
