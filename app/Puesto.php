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

    public function scope_getPuestosBloque($query, $id_bloque)
    {
        $puestos = $query->join('categorias as c','c.id','id_categoria')
            ->join('bloques as b','b.id','id_bloque')
            ->join('modulos as m','m.id','b.id_modulo')
            ->join('proyectos as p','p.id','m.id_proyecto')
            ->where('id_bloque','=',$id_bloque)
            ->select(
                'puestos.id',
                'puestos.nro as numero',
                'largo',
                'ancho',
                'estado',
                'p.nombre as proyecto',
                'p.id as id_proyecto',
                'm.nro as modulo',
                'b.numero as bloque',
                'c.nombre as categoria',
                'c.color as color',
                'c.precio as precio',
                'c.cuota_inicial as cuota_inicial',
                'c.cuota_mensual',
                'c.plazo_meses'
            )->orderBy('puestos.id','asc');
        return $puestos;
    }public function scope_getPuesto($query, $id_puesto)
    {
        $puesto = $query->join('categorias as c','c.id','id_categoria')
            ->join('bloques as b','b.id','id_bloque')
            ->join('modulos as m','m.id','b.id_modulo')
            ->join('proyectos as p','p.id','m.id_proyecto')
            ->where('puestos.id','=',$id_puesto)
            ->select(
                'puestos.id',
                'puestos.nro as numero',
                'largo',
                'ancho',
                'estado',
                'p.nombre as proyecto',
                'p.id as id_proyecto',
                'm.nro as modulo',
                'b.numero as bloque',
                'c.nombre as categoria',
                'c.color as color',
                'c.precio as precio',
                'c.cuota_inicial as cuota_inicial',
                'c.cuota_mensual',
                'c.plazo_meses'
            )->get()->first();
        return $puesto;
    }
}
