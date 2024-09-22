@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Ventas</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ventas Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('ventas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nueva Venta</a>
                    </div>

                </div>

                <div class="card-body">
                    <table id= "table_compr" class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th>Comprobante</th>
                                <th>Cliente</th>
                                <th>Fecha y hora</th>
                                <th>Vendedor</th>
                                <th>Total</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td>
                                        <p class="fw-semibold mb-1">{{ $venta->comprobante->tipo_comprobante }}</p>
                                        <p class="text-muted mb-0">{{ $venta->numero_comprobante }}</p>
                                    </td>
                                    <td>
                                        <p class="fw-semibold mb-1">{{ ucfirst($venta->cliente->persona->tipo_persona) }}
                                        </p>
                                        <p class="text-muted mb-0">{{ $venta->cliente->persona->razon_social }}</p>
                                    </td>
                                    <td>
                                        <div class="row-not-space">
                                            <p class="fw-semibold mb-1"><span class="m-1"><i
                                                        class="fa-solid fa-calendar-days"></i></span>{{ \Carbon\Carbon::parse($venta->fecha_hora)->format('d-m-Y') }}
                                            </p>
                                            <p class="fw-semibold mb-0"><span class="m-1"><i
                                                        class="fa-solid fa-clock"></i></span>{{ \Carbon\Carbon::parse($venta->fecha_hora)->format('H:i') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $venta->user->name }}
                                    </td>
                                    <td>
                                        {{ $venta->total }}
                                    </td>

                                    <td style="text-align: center; vertical-align: middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('ventas.show', ['venta' => $venta]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('ventas.edit', ['venta' => $venta]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('ventas.destroy', ['venta' => $venta]) }}"
                                                method="POST" onclick="preguntar{{ $venta->id }} (event)"
                                                id="miFormulario{{ $venta->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $venta->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "Esta Seguro?",
                                                        text: "Esto no podra ser Revertido!",
                                                        icon: "warning",
                                                        showDenyButton: true,
                                                        confirmButtonText: "Si, Eliminar!",
                                                        confirmButtonColor: "#3085d6",
                                                        denyButtonColor: "#d33",
                                                        denyButtonText: "Cancelar!",
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario{{ $venta->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                        </div>
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

    <script>
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
    </script>
@stop
