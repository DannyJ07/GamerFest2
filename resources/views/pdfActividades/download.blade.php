<!doctype html>
<html lang="en">

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
        <h5 class=" font-weight-bold">Listado de Actividades</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Lugar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($actividades as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->fecha}}</td>
                    <td>{{ $row->hora}}</td>
                    <td>{{ $row->lugar}}</td>
                    
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>