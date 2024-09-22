@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Reportes</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Reportes Disponibles</h3>
                    <div class="card-tools">
                        <a href="{{ url('/home') }}" class="btn btn-primary"><i class="fa fa-home"></i> Vista
                            Principal</a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col">Nombre del Reporte</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="text-align: center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>

                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>Compras Realizadas</td>
                                <td>Muestra el historico de las Compras Realizadas</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/reporte/reporteCompraTotales') }}" class="btn btn-info btn-sm"><i
                                                class="fas
                                                fa-eye"></i>
                                            WEB</a>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i>
                                                PDF</a>
                                        </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>Compras Realizadas por Mes</td>
                                <td>Muestra el historico mensual de las Compras Realizadas</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/reporte/reporteCompraMes') }}" class="btn btn-info btn-sm"><i
                                                class="fas
                                            fa-eye"></i>
                                            WEB</a>
                                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i>
                                            PDF</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>Ventas Realizadas</td>
                                <td>Muestra el historico de las Ventas Realizadas</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/reporte/reporteVentaTotales') }}" class="btn btn-info btn-sm"><i
                                                class="fas
                                            fa-eye"></i>
                                            WEB</a>
                                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i>
                                            PDF</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>Ventas Realizadas por Mes</td>
                                <td>Muestra el historico mensual de las Ventas Realizadas</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/reporte/reporteVentaMes') }}" class="btn btn-info btn-sm"><i
                                                class="fas
                                            fa-eye"></i>
                                            WEB</a>
                                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i>
                                            PDF</a>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center">{{ $contador++ }}</td>
                                <td>Productos mas Vendidos</td>
                                <td>Muestra el historico de los Productos Mas Vendidos</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/reporte/reporteProdMasVend') }}" class="btn btn-info btn-sm"><i
                                                class="fas
                                            fa-eye"></i>
                                            WEB</a>
                                        <a href="" class="btn btn-success btn-sm"><i class="fa fa-file-text"></i>
                                            PDF</a>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

@stop

@section('css')

@stop

@section('js')


@stop
