@extends('adminlte::page')


@section('content_header')
    <h1><b>Listado de Roles</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('admin/roles/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Crear
                            Nuevo Rol</a>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table table-striped  table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col">Nombre Rol</th>
                                <th scope="col" style="text-align: center">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $contador = 1; ?>
                            @foreach ($roles as $role)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/roles', $role->id) }}" class="btn btn-info btn-sm"><i
                                                    class="fas
                                                fa-eye"></i></a>

                                            <a href="{{ url('/admin/roles/' . $role->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i
                                                    class="fas
                                            fa-pencil"></i></a>
                                            <form action="{{ url('/admin/roles', $role->id) }}" method="POST"
                                                onclick="preguntar{{ $role->id }} (event)"
                                                id="miFormulario{{ $role->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    style="border-radius: 0px 4px 4px 0px"><i
                                                        class="fas
                                        fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function preguntar{{ $role->id }}(event) {
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
                                                            var form = $('#miFormulario{{ $role->id }}');
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
