@extends('adminlte::page')

@section('content_header')
    <h1><b>Usuario Registrado</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>

                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role">Nombre del Rol</label>
                                <p>{{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombre del Usuario</label>
                                <p>{{ $usuario->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Correo Electronico</label>
                                <p>{{ $usuario->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="created_at">Fecha y Hora de Registro</label>
                                <p>{{ $usuario->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/usuarios') }}" class = "btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@stop

@section('css')

@stop

@section('js')


@stop
