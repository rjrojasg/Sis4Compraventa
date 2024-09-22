@extends('adminlte::page')

@section('content_header')
    <h1><b>Datos del Proveedor</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>

                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tipo_persona">Tipo de Cliente</label>
                                <p>{{ $proveedor->persona->tipo_persona }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="razon_social">Nombre</label>
                                <p>{{ $proveedor->persona->razon_social }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="documento_id ">Tipo de Documento</label>
                                <p>{{ $proveedor->persona->documento->tipo_documento }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="numero_documento">Numero de Documento</label>
                                <p>{{ $proveedor->persona->numero_documento }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="direccion">Direccion</label><b>*</b>
                                <p>{{ $proveedor->persona->direccion }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('proveedores.index') }}" class = "btn btn-secondary">Volver</a>
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
