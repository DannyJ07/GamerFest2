@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>

    </html>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $stats['num_participantes'] }}</h3>
                            <p>Participantes</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $stats['num_juegos'] }}<sup style="font-size: 20px"></sup></h3>

                            <p>Juegos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $stats['num_ins_ind'] }}</h3>

                            <p>Inscripciones Individuales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $stats['num_ins_gru'] }}</h3>

                            <p>Inscripciones Grupales</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Más información<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-1">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Inscripciones individuales por juego
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="chart" id="revenue-chart" style="position: relative; height: 300px; ">
                                <canvas id="inscripciones-ind-x-juego" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title m-1">
                                <i class="fas fa-chart-bar mr-1"></i>
                                Inscripciones Grupales por juego
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="chart" id="revenue-chart" style="position: relative; height: 300px; ">
                                <canvas id="inscripciones-gru-x-juego" height="300" style="height: 300px;"></canvas>
                            </div>
                        </div><!-- /.card-body -->
                    </div>

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                To Do List
                            </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Item</th>
                                            <th>Status</th>
                                            <th>Popularity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Call of Duty IV</td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    90,80,90,-70,61,-83,63</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                    90,80,-90,70,61,-83,68</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>iPhone 6 Plus</td>
                                            <td><span class="badge badge-danger">Delivered</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f56954" data-height="20">
                                                    90,-80,90,70,-61,83,63</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="badge badge-info">Processing</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00c0ef" data-height="20">
                                                    90,80,-90,70,-61,83,63</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR1848</a></td>
                                            <td>Samsung Smart TV</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f39c12" data-height="20">
                                                    90,80,-90,70,61,-83,68</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                            <td>iPhone 6 Plus</td>
                                            <td><span class="badge badge-danger">Delivered</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#f56954" data-height="20">
                                                    90,-80,90,70,-61,83,63</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                            <td>Call of Duty IV</td>
                                            <td><span class="badge badge-success">Shipped</span></td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                    90,80,90,-70,61,-83,63</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title m-1">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Inscripciones por categoría de juego
                            </h3>
                        </div>
                        <div class="card-body">
                            <canvas id="ins-x-cat" height="300" style="height: 300px;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <!-- /.card -->

                    <!-- solid sales graph -->
                    <div class="card bg-gradient-info" style="height: 395px">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line mr-1"></i>
                                Juegos más populares
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Juego</th>
                                            <th>N° Inscripciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach (json_decode($data4) as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nombre }}</td>
                                                <td>{{ $row->inscripciones }}</td>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title m-1">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Juegos por categoría de juego
                            </h3>
                        </div>
                        <div class="card-body">
                            <canvas id="jug-x-cat" height="300" style="height: 300px;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>

                    <div class="card bg-gradient-white">
                        <div class="card-header border-0">
                            <h3 class="card-title m-1">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Inscripciones Individuales VS. Grupales
                            </h3>
                        </div>
                        <div class="card-body">
                            <canvas id="ins-x-modo" height="300" style="height: 300px;"></canvas>
                        </div>
                        <!-- /.card-body-->
                    </div>
                    <!-- /.card -->
                </section>

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@stop

@section('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
    <script>
        const juegos = JSON.parse(`<?php echo $data1['data']; ?>`);
        const juegos2 = JSON.parse(`<?php echo $data2['data']; ?>`);
        const juegos3 = JSON.parse(`<?php echo $data3['data']; ?>`);
        const juegos5 = JSON.parse(`<?php echo $data5['data']; ?>`);
        const juegos6 = JSON.parse(`<?php echo $data6['data']; ?>`);

        console.log(juegos);
        console.log(juegos2);
        const ctx = document.getElementById('inscripciones-ind-x-juego');
        const ctx2 = document.getElementById('inscripciones-gru-x-juego');
        const ctx3 = document.getElementById('ins-x-cat');
        const ctx4 = document.getElementById('jug-x-cat');
        const ctx5 = document.getElementById('ins-x-modo');


        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: juegos.label,
                datasets: [{
                    label: '# de Inscripcioness',
                    data: juegos.data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 0.75,
                            fontColor: '#474747',
                            beginAtZero: true
                        },
                    }]
                }
            }
        });
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: juegos2.label,
                datasets: [{
                    label: '# de Inscripcioness',
                    data: juegos2.data,
                    borderWidth: 2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 0.75,
                            beginAtZero: true
                        },
                    }]
                }
            }
        });

        new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: juegos3.label,
                datasets: [{
                    label: '# of Votes',
                    data: juegos3.data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],

                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
            }
        });

        new Chart(ctx4, {
            type: 'doughnut',
            data: {
                labels: juegos5.label,
                datasets: [{
                    label: '# of Votes',
                    data: juegos5.data,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],

                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
            }
        });

        new Chart(ctx5, {
            type: 'polarArea',
            data: {
                labels: juegos6.label,
                datasets: [{
                    data: [{{$stats['num_ins_ind']}},{{$stats['num_ins_gru']}}],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 248, 154, 1)',
                        'rgba(255, 203, 203, 1)',
                        'rgba(243, 120, 120, 1)',
                        'rgba(115, 169, 173, 1)'
                    ],

                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
            }
        });
    </script>
@stop
