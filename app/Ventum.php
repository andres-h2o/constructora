<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ventas';

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
    protected $fillable = ['fecha', 'monto', 'id_puesto', 'id_vendedor', 'id_mes', 'id_tipo_venta'];

    
}
