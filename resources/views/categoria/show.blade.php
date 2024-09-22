@extends('adminlte::page')

@section('content_header')
    <h1><b>Categoria Registrada</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>

                <div class="card-body">


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nombre de la Categoria</label>
                                <p>{{ $categoria->caracteristica->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <p>{{ $categoria->caracteristica->descripcion }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="created_at">Fecha y Hora de Registro</label>
                                <p>{{ $categoria->caracteristica->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('categorias.index') }}" class = "btn btn-secondary">Volver</a>
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
