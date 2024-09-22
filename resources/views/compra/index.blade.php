@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Compras</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compras Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('compras.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nueva Compra</a>
                    </div>

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
                                <th scope="col" style="text-align: center">Acciones</th>

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

                                    <td style="text-align: center; vertical-align: middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('compras.show', ['compra' => $compra]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('compras.edit', ['compra' => $compra]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('compras.destroy', ['compra' => $compra]) }}"
                                                method="POST" onclick="preguntar{{ $compra->id }} (event)"
                                                id="miFormulario{{ $compra->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $compra->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $compra->id }}');
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
