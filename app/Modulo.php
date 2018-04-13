<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modulos';

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
    protected $fillable = ['nro', 'id_proyecto'];

    
}
