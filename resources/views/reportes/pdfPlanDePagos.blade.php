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
        width: 80%;
        padding-left: 18%;
    }

    th, td {
        padding: 3px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 80%;
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
    <strong style="color: #4276af">{{$puesto->proyecto}}</strong>
    <br><strong style="color: #af450b">Plan de Pagos</strong>
    <br>
    <strong>Venta Puesto: {{$puesto->bloque.'-'.$puesto->numero}}</strong>
    <br>

</div>
<div class="form-group">
    <br>
    <div>
        <table >
            <tr>
                <td style="text-align: right;"><strong>Cliente : </strong></td>
                <td style="text-transform: uppercase">{{$cliente->nombre}}</td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>CI : </strong></td>
                <td>{{$cliente->ci}}</td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>Fecha : </strong></td>
                <td>{{$venta->created_at}}</td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>Tipo de Venta : </strong></td>
                <td>{{$tipoVenta->nombre}} </td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>Cuota Inicial :</strong></td>
                <td>{{$venta->monto}} $us</td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>Oficial de Venta : </strong></td>
                <td>{{$vendedor->nombre}}</td>
            </tr>
        </table>

    </div>
</div>
<div class="panel panel-default">
    <br>
    <h3 style="padding-left: 10%">Cuotas:</h3>
    <div>
        <div class="panel-body">
            <table>
                <tr>
                    <th style="text-transform: uppercase">Nro</th>
                    <th style="text-transform: uppercase">Fecha</th>
                    <th style="text-transform: uppercase">Monto</th>
                </tr>
                @foreach($cuota as $item)

                    <tr>
                        <td style="text-transform: uppercase;text-align: left">{{$item['cuota']}}</td>
                        <td style="text-transform: uppercase">{{$item['fecha']}}</td>
                        <td style="text-transform: uppercase">{{$item['monto']}} $us.</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
<h5 style="text-align: right"> Fecha de impresión: {{Jenssegers\Date\Date::now()->toDateTimeString()}}</h5>

</body>
</html>