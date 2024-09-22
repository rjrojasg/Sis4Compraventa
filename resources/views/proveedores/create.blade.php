@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de un Nuevo Proveedor</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="tipo_persona">Tipo de Proveedor</label><b>*</b>
                                    <select name="tipo_persona" id="tipo_persona" class="form-control">
                                        <option value="" selected>Selecciona una Opción</option>
                                        <option value="natural" {{ old('tipo_persona') == 'natural' ? 'selected' : '' }}>
                                            Persona Natural</option>
                                        <option value="juridica" {{ old('tipo_persona') == 'juridica' ? 'selected' : '' }}>
                                            Persona Juridica</option>
                                    </select>
                                    @error('tipo_persona')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="razon_social">Nombre</label><b>*</b>
                                    <input type="text" class="form-control" value="{{ old('razon_social') }}"
                                        name="razon_social" required>
                                    @error('razon_social')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="documento_id ">Tipo de Documento</label><b>*</b>
                                    <select name="documento_id" id="documento_id" class="form-control">

                                        <option value="" selected>Selecciona una Opción</option>
                                        @foreach ($documentos as $documento)
                                            <option value="{{ $documento->id }}"
                                                {{ old('documento_id') == $documento->id ? 'selected' : '' }}>
                                                {{ $documento->tipo_documento }}</option>
                                        @endforeach
                                    </select>
                                    @error('documento_id')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="numero_documento">Numero de Documento</label><b>*</b>
                                    <input type="text" class="form-control" value="{{ old('numero_documento') }}"
                                        name="numero_documento" required>
                                    @error('numero_documento')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Direccion</label><b>*</b>
                                    <input type="text" class="form-control" value="{{ old('direccion') }}"
                                        name="direccion" required>
                                    @error('direccion')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ route('proveedores.index') }}" class = "btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Registar</button>
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
