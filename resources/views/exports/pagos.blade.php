<table>
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Monto Ministrado</th>
        <th>Total a pagar</th>
        <th>Fecha de Ministración</th>
        <th>Fecha de Vencimiento</th>
        <th>Cuota</th>
        <th>Numeros de Pagos</th>
        <th>Numeros de Pagos Realizado</th>
        <th>Saldo Abonado</th>
        <th>Saldo Pendiente</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pago as $pagos)
        <tr>
            <td>{{ $pagos->idpagos }}</td>
            <td>{{ $pagos->cliente->nombre}}</td>
            <td>{{ $pagos->prestamo->cantidad}}</td>
            <td>{{ $pagos->cantidad}}</td>
            <td>{{ $pagos->prestamo->fecha_de_ministerio}}</td>
            <td>{{ $pagos->prestamo->fecha_de_vencimiento}}</td>
            <td>{{ $pagos->prestamo->cuota}}</td>
            <td>{{ $pagos->prestamo->numero_de_pagos}}</td>
            <td>{{ $pagos->numero}}</td>
            <td>{{ $pagos->cantidad_recibida}}</td>
            <td>{{ $pagos->total}}</td>
        </tr>
    @endforeach
    </tbody>
</table>