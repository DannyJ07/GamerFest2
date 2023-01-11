@extends('adminlte::page')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
<!doctype html>
<html lang="en">
  <head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>
      <div class="container py-5">
          <div class="row">
              <div class="col-xl-12 text-right">
                  <a href="{{ route('downloadJuego-pdf') }}" class="btn btn-success btn-sm">Exportar a PDF</a>
              </div>
          </div>

          <div class="card mt-4">
              <div class="card-header">
                    <h5 class="card-title font-weight-bold">Listado de juegos</h4>
              </div>

              <div class="card-body">
                    <table class="table table-bordered">
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
          </div>
      </div>
  </body>
</html>

        </div>
    </div>
</div>
@endsection
