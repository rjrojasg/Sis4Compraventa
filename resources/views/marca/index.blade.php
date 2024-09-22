@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Marcas</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Marcas Registradas</h3>
                    <div class="card-tools">
                        <a href="{{ route('marcas.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nueva Marca</a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col">Nombre de la Marca</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col" style="text-align: center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($marcas as $marca)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $marca->caracteristica->nombre }}</td>
                                    <td>{{ $marca->caracteristica->descripcion }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('marcas.show', ['marca' => $marca]) }}"
                                                class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ route('marcas.edit', ['marca' => $marca]) }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ route('marcas.destroy', ['marca' => $marca->id]) }}"
                                                method="POST" onclick="preguntar{{ $marca->id }} (event)"
                                                id="miFormulario{{ $marca->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $marca->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: "Desea Eliminar el Registro?",
                                                        text: "Esto no podra ser Revertido y Eliminaras las Caracteristicas Asociados!",
                                                        icon: "warning",
                                                        showDenyButton: true,
                                                        confirmButtonText: "Si, Eliminar!",
                                                        confirmButtonColor: "#3085d6",
                                                        denyButtonColor: "#d33",
                                                        denyButtonText: "Cancelar!",
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#miFormulario{{ $marca->id }}');
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
