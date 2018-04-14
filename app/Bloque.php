<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bloques';

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
    protected $fillable = ['numero', 'id_modulo'];

    public function scope_getBloquesModulo($query, $id_modulo)
    {
        $bloques = $query->join('modulos as m','m.id','id_modulo')
            ->where('id_modulo',$id_modulo)
            ->select(
                'm.nro as modulo',
                'bloques.id as id_bloque',
                'bloques.numero as bloque'
            )->orderBy('bloques.numero','asc');
        return $bloques;
    }
}
