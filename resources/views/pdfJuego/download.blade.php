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
        <h5 class=" font-weight-bold">Listado de Juegos</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Reglas</th>
                    <th>Aula</th>
                    <th>Valor</th>
                    <th>Fecha</th>
                    <th>Categoria</th>
                    <th>Modo</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($juegos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->reglas }}</td>
                    <td>{{ $row->aula }}</td>
                    <td>{{ $row->valor }}</td>
                    <td>{{ $row->fecha_evento }}</td>
                    <td>{{ $row->categoria->tipo }}</td>
                    <td>{{ $row->modo->tipo }}</td>
                    
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>