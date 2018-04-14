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

    public function scope_getVendedoresProyecto($query,$id_proyecto)
    {
        $vendedores = $query->join('grupos as g','g.id','id_grupo')
            ->where('g.id_proyecto','=',$id_proyecto)
            ->select(
                'vendedors.nombre as nombre',
                'vendedors.id as id'
            )->orderBy('vendedors.nombre','asc');
        return $vendedores;
    }
}
