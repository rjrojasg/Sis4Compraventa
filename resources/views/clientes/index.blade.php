@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Clientes</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Clientes Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            Crear
                            Nuevo Cliente</a>
                    </div>

                </div>

                <div class="card-body">
                    <table id= "table_prov" class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Nombre</th>
                                <th scope="col"style="text-align: center">Direccion</th>
                                <th scope="col"style="text-align: center">Tipo de Documento</th>
                                <th scope="col" style="text-align: center">Numero de Documento</th>
                                <th scope="col" style="text-align: center">Tipo de Persona</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $contador++ }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $cliente->persona->razon_social }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $cliente->persona->direccion }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $cliente->persona->documento->tipo_documento }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $cliente->persona->numero_documento }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $cliente->persona->tipo_persona }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('clientes.show', ['cliente' => $cliente]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('clientes.edit', ['cliente' => $cliente]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('clientes.destroy', ['cliente' => $cliente]) }}"
                                                method="POST" onclick="preguntar{{ $cliente->id }} (event)"
                                                id="miFormulario{{ $cliente->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $cliente->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $cliente->id }}');
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
        $('#table_prov').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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
