@extends('adminlte::page')

@section('content_header')
    <h1><b>Modificar Marca</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('marcas.update', ['marca' => $marca]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Marca</label>
                                    <input type="text" class="form-control" value="{{ $marca->caracteristica->nombre }}"
                                        name="nombre" required>
                                    @error('nombre')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <input type="text" class="form-control"
                                        value="{{ $marca->caracteristica->descripcion }}" name="descripcion">
                                    @error('descripcion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('marcas.index') }}" class = "btn btn-secondary">Cancelar</a>
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
