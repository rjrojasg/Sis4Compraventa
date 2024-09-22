@extends('adminlte::page')


@section('content_header')
    <h1><b>Historico de Compras Realizadas</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compras Registradas</h3>
                </div>

                <div class="card-body">
                    <table id= "table_compr" class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Comprobante</th>
                                <th scope="col" style="text-align: center">Proveedor</th>
                                <th scope="col"style="text-align: center">Fecha</th>
                                <th scope="col" style="text-align: center">Monto de Compra</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle">{{ $contador++ }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        <p class="fw-semibold mb-1">{{ $compra->comprobante->tipo_comprobante }}</p>
                                        <p class="text-muted mb-0">{{ $compra->numero_comprobante }}</p>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle">
                                        <p class="fw-semibold mb-1">{{ $compra->proveedor->persona->tipo_persona }}</p>
                                        <p class="text-muted mb-0">{{ $compra->proveedor->persona->razon_social }}</p>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ \Carbon\Carbon::parse($compra->fecha)->format('d-m-Y') }}
                                    </td>
                                    <td style="text-align: center; vertical-align: middle">{{ $compra->total }}
                                    </td>
                                </tr>
                            @endforeach
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

    {{-- <script>
        $('#table_compr').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },

        });
    </script> --}}
@stop
