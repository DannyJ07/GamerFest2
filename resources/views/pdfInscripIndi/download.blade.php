<!doctype html>
<html lang="es">

<head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h5 class=" font-weight-bold">Listado de Inscripciones</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Juego</th>
                    <th>Participante</th>
                    <th>Pago</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inscripcionis as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->fecha }}</td>
					<td>{{ $row->total }}</td>
					<td>{{ $row->juego->nombre }}</td>
					<td>{{ $row->participante->nombre }}</td>
					<td>{{ $row->Tipopg->tipo }}</td>

                    
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>