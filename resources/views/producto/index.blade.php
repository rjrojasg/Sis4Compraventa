@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Productos</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Productos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nuevo Producto</a>
                    </div>

                </div>

                <div class="card-body">
                    <table id= "table_prod" class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col"style="text-align: center">Codigo</th>
                                <th scope="col" style="text-align: center">Nombre del Producto</th>
                                <th scope="col" style="text-align: center">Categoria</th>
                                <th scope="col" style="text-align: center">Fecha de Vencimiento</th>
                                <th scope="col" style="text-align: center">Marca</th>
                                <th scope="col" style="text-align: center">Presentacion</th>
                                <th scope="col" style="text-align: center">Stock</th>
                                <th scope="col" style="text-align: center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td style="text-align: center; vertical-align: middle">{{ $contador++ }}</td>
                                    <td style="text-align: center; vertical-align: middle">{{ $producto->codigo }}</td>
                                    <td style="text-align: center; vertical-align: middle">{{ $producto->nombre }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        @foreach ($producto->categorias as $category)
                                            <div class="contenier">
                                                <div class="row">
                                                    {{ $category->caracteristica->nombre }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $producto->fecha_vencimiento }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $producto->marca->caracteristica->nombre }}</td>
                                    <td style="text-align: center; vertical-align: middle">
                                        {{ $producto->presentacione->caracteristica->nombre }}</td>
                                    <td
                                        style="text-align: center; vertical-align: middle; background-color: rgba(233,231,16,0.15)">
                                        {{ $producto->stock }}</td>

                                    <td style="text-align: center; vertical-align: middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('productos.show', ['producto' => $producto]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('productos.edit', ['producto' => $producto]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('productos.destroy', ['producto' => $producto]) }}"
                                                method="POST" onclick="preguntar{{ $producto->id }} (event)"
                                                id="miFormulario{{ $producto->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $producto->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $producto->id }}');
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
        $('#table_prod').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 to 0 of 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
