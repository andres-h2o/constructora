<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe general {{Jenssegers\Date\Date:: parse($mes->fecha_inicio)->format('F Y')}} </title>
    {!!Html::style('css/myStyle.css')!!}
</head>
<style type="text/css">
    .table-and {
        width: 100%;
        border-collapse: collapse;
    }

    .th-and, .td-and {
        border: 1px solid black;
        padding: 4px;
        text-align: center;

    }

    .tr-and {
        background: #ffffff;
    }
</style>
<body>
{{--<a class="image featured"><img src="images/cavezera1.png"  style="width: 100%  ;" /></a>--}}
<div style="text-transform: uppercase;text-align:center">
    <strong>Resumen general de Ventas </strong>
    <br>
    <strong style="color: red">{{$proyecto->nombre}}</strong>
    <br>
    <strong>{{$proyecto->zona}}</strong>
    <br><br>
    <strong>Mes : "{{Jenssegers\Date\Date:: parse($mes->fecha_inicio)->format('F Y')}}"</strong>
</div>

<div class="panel panel-default">
    <br><br><br>
    <div>
        <div class="panel-body">
            <table class="table-and">
                <tr class="tr-and">
                    <th class="th-and" style="text-transform: uppercase">Oficial de Ventas</th>
                    <th class="th-and" style="text-transform: uppercase">Ventas <br>$us</th>
                    <th class="th-and" style="text-transform: uppercase">Nro. de Puestos</th>
                    <th class="th-and" style="text-transform: uppercase">Ventas <br>al Contado</th>
                    <th class="th-and" style="text-transform: uppercase">Ventas <br>a Credito</th>
                </tr>
                @foreach($datos as $item)
                    <tr class="tr-and">
                        <td class="th-and" style="text-transform: uppercase;text-align: left">{{$item->vendedor}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{number_format($item->montoContado+$item->montoCredito, 2, ',', '.')}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->nroContado+$item->nroCredito}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->nroContado}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->nroCredito}}</td>
                    </tr>
                @endforeach
                <tr class="tr-and" style="color: red">
                    <td style="text-align: right"><strong>Total :</strong></td>
                    <td class="th-and" style="text-transform: uppercase">$us.- {{number_format($total, 2, ',', '.')}}</td>
                    <td class="th-and" style="text-transform: uppercase">{{$nroTotal}}</td>
                    <td ></td>
                    <td ></td>
                </tr>
            </table>
        </div>
    </div>
</div>


</body>
</html>