@extends('adminlte::page')

@section('content_header')
    <h1><b>Modificar Rol</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/roles', $role->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol</label>
                                    <input type="text" class="form-control" value="{{ $role->name }}" name="name"
                                        required>
                                    @error('name')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!---Permisos---->
                            <div class="col-12">
                                <p class="text-muted">Permisos para el rol:</p>
                                @foreach ($permisos as $item)
                                    @if (in_array($item->id, $role->permissions->pluck('id')->toArray()))
                                        <div class="form-check mb-2">
                                            <input checked type="checkbox" name="permission[]" id="{{ $item->id }}"
                                                class="form-check-input" value="{{ $item->id }}">
                                            <label for="{{ $item->id }}"
                                                class="form-check-label">{{ $item->name }}</label>
                                        </div>
                                    @else
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permission[]" id="{{ $item->id }}"
                                                class="form-check-input" value="{{ $item->id }}">
                                            <label for="{{ $item->id }}"
                                                class="form-check-label">{{ $item->name }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @error('permission')
                                <small class="text-danger">{{ '*' . $message }}</small>
                            @enderror


                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
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
