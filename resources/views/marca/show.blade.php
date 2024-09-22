@extends('adminlte::page')

@section('content_header')
    <h1><b>Marca Registrada</b></h1>

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
                                <label for="name">Nombre de la Marca</label>
                                <p>{{ $marca->caracteristica->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <p>{{ $marca->caracteristica->descripcion }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="created_at">Fecha y Hora de Registro</label>
                                <p>{{ $marca->caracteristica->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('marcas.index') }}" class = "btn btn-secondary">Volver</a>
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
