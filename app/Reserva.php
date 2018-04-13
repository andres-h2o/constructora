<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reservas';

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
    protected $fillable = ['fecha', 'monto', 'fecha_fin', 'dias', 'id_puesto', 'id_vendedor', 'id_tipoReserva', 'id_mes'];

    
}
