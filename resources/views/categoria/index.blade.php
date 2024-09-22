@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Categorias</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Categorias Registradas</h3>
                    <div class="card-tools">
                        <a href="{{ route('categorias.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nueva Categoria</a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col">Nombre de la Categoria</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="text-align: center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $categoria->caracteristica->nombre }}</td>
                                    <td>{{ $categoria->caracteristica->descripcion }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('categorias.show', ['categoria' => $categoria]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('categorias.edit', ['categoria' => $categoria]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('categorias.destroy', ['categoria' => $categoria->id]) }}"
                                                method="POST" onclick="preguntar{{ $categoria->id }} (event)"
                                                id="miFormulario{{ $categoria->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $categoria->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "Desea Eliminar el Registro?",
                                                        text: "Esto no podra ser Revertido y Eliminaras los Productos Asociados!",
                                                        icon: "warning",
                                                        showDenyButton: true,
                                                        confirmButtonText: "Si, Eliminar!",
                                                        confirmButtonColor: "#3085d6",
                                                        denyButtonColor: "#d33",
                                                        denyButtonText: "Cancelar!",
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario{{ $categoria->id }}');
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


@stop
