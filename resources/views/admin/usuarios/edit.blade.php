@extends('adminlte::page')

@section('content_header')
    <h1><b>Modificar Datos del Usuario</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/usuarios', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role">Nombre del Rol</label>
                                    <select name="role" id="" class = "form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}"
                                                {{ $role->name == $usuario->roles->pluck('name')->implode(', ') ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Nombre del Usuario</label>
                                    <input type="text" class="form-control" value="{{ $usuario->name }}" name="name"
                                        required>
                                    @error('name')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="text" class="form-control" value="{{ $usuario->email }}" name="email"
                                        required>
                                    @error('email')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password') }}"
                                        name="password">
                                    @error('password')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/usuarios') }}" class = "btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                                        Modificar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

@stop

@section('css')

@stop

@section('js')


@stop
