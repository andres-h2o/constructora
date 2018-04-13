<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorium extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categorias';

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
    protected $fillable = ['nombre', 'color', 'precio', 'cuota_inicial', 'cuota_mensual', 'plazo_meses', 'id_proyecto'];

    
}
