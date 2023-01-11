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
                  <a href="{{ route('downloadActividade-pdf') }}" class="btn btn-success btn-sm">Exportar a PDF</a>
              </div>
          </div>

          <div class="card mt-4">
              <div class="card-header">
                    <h5 class="card-title font-weight-bold">Listado de Actividades</h4>
              </div>

              <div class="card-body">
                    <table class="table table-bordered">
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
          </div>
      </div>
  </body>
</html>

        </div>
    </div>
</div>
@endsection