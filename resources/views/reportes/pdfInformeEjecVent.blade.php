<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe ventas </title>
    {!!Html::style('css/myStyle.css')!!}
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 3px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 70%;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    th {
        background-color: #4276af;
        color: white;
    }
</style>

<body class="page">
{{--<a class="image featured"><img src="images/cavezera1.png"  style="width: 100%  ;" /></a>--}}
<div style="text-transform: uppercase;text-align:center">
    <strong style="color: red">{{$proyecto}}</strong>
    <br>Resumen de Ventas de<br>
    <strong>{{$nombre}}</strong>
    <br>

</div>

<div class="panel panel-default">
    <br>
    <br>
    <div>
        <div class="panel-body">
            <table class="table-and">
                <tr class="tr-and">
                    <th class="th-and" style="text-transform: uppercase">Cliente</th>
                    <th class="th-and" style="text-transform: uppercase">CI</th>
                    <th class="th-and" style="text-transform: uppercase">Nro. <br> de Venta</th>
                    <th class="th-and" style="text-transform: uppercase">Fecha</th>
                    <th class="th-and" style="text-transform: uppercase">Puesto</th>
                    <th class="th-and" style="text-transform: uppercase">Tipo <br>de Venta</th>
                    <th class="th-and" style="text-transform: uppercase">Plazo</th>
                    <th class="th-and" style="text-transform: uppercase">Precio <br>$us.</th>
                    <th class="th-and" style="text-transform: uppercase">Pagado <br>$us.</th>
                </tr>
                @foreach($datos as $item)
                    @if($loop->iteration==21)
                        <tr><td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td></tr>
                        <tr>
                            <td><br><br><br><br><br><br><br><br></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="tr-and">
                            <th class="th-and" style="text-transform: uppercase">Cliente</th>
                            <th class="th-and" style="text-transform: uppercase">CI</th>
                            <th class="th-and" style="text-transform: uppercase">Nro. <br> de Venta</th>
                            <th class="th-and" style="text-transform: uppercase">Fecha</th>
                            <th class="th-and" style="text-transform: uppercase">Puesto</th>
                            <th class="th-and" style="text-transform: uppercase">Tipo <br>de Venta</th>
                            <th class="th-and" style="text-transform: uppercase">Plazo</th>
                            <th class="th-and" style="text-transform: uppercase">Precio <br>$us.</th>
                            <th class="th-and" style="text-transform: uppercase">Pagado <br>$us.</th>
                        </tr>

                    @endif
                    <tr class="tr-and">
                        <td class="th-and" style="text-transform: uppercase;text-align: left">{{ $loop->iteration}}
                            .- {{$item->cliente}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->ci}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->nro_venta}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->fecha}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->puesto}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->tipo}}</td>
                        <td class="th-and" style="text-transform: uppercase">{{$item->plazo}}</td>
                        <td class="th-and"
                            style="text-transform: uppercase">{{number_format($item->precio, 2, ',', '.')}}</td>
                        <td class="th-and"
                            style="text-transform: uppercase">{{number_format($item->monto, 2, ',', '.')}}</td>
                    </tr>
                @endforeach
            </table>
            <br><br>
            <table style="width:50%">

                <tr class="tr-and">
                    <td style="text-align: right">
                        <strong>Total a Contado :</strong>
                    </td>
                    <td class="th-and" style="text-transform: uppercase">
                        <strong>$us.- {{number_format($totalContado, 2, ',', '.')}}</strong>
                    </td>
                    <td class="th-and">{{$nroContado}} puestos.</td>
                    <td></td>

                </tr>
                <tr class="tr-and">
                    <td style="text-align: right"><strong>Total a Credito:</strong></td>
                    <td class="th-and" style="text-transform: uppercase">
                        <strong>$us.- {{number_format($totalCredito, 2, ',', '.')}}</strong></td>
                    <td class="th-and">{{$nroCredito}} puestos.</td>
                    <td></td>

                </tr>
                <tr class="tr-and">
                    <td style="text-align: right"><strong>Total :</strong></td>
                    <td class="th-and" style="text-transform: uppercase">
                        <strong style="color: red">$us.- {{number_format($total, 2, ',', '.')}}</strong></td>
                    <td class="th-and"><strong>{{$nroTotal}} puestos.</strong></td>
                    <td></td>

                </tr>
            </table>
        </div>
    </div>
</div>
<h5 style="text-align: right"> Fecha de impresión: {{Jenssegers\Date\Date::now()->toDateTimeString()}}</h5>

</body>
</html>