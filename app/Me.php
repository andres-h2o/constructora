<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Me extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mes';

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
    protected $fillable = ['ventas_contado', 'monto_ventas_contado', 'ventas_credito', 'monto_ventas_credito', 'nro_reservas', 'fecha_inicio', 'fecha_cierre', 'estado','meta','id_proyecto'];

    
}
