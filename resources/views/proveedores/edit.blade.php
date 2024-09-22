@extends('adminlte::page')

@section('content_header')
    <h1><b>Modificar Datos del Proveedor</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ route('proveedores.update', ['proveedore' => $proveedore]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo_persona">Tipo de Cliente:
                                    </label>
                                    <p><span>{{ $proveedore->persona->tipo_persona }}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="razon_social">Nombre</label><b>*</b>
                                    <input type="text" class="form-control"
                                        value="{{ old('razon_social', $proveedore->persona->razon_social) }}"
                                        name="razon_social" required>
                                    @error('razon_social')
                                        <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="documento_id ">Tipo de Documento</label><b>*</b>
                                    <select name="documento_id" id="documento_id" class="form-control">

                                        @foreach ($documentos as $documento)
                                            @if ($proveedore->persona->documento_id == $documento->id)
                                                <option selected value="{{ $documento->id }}"
                                                    {{ old('documento_id') == $documento->id ? 'selected' : '' }}>
                                                    {{ $documento->tipo_documento }}</option>
                                            @else
                                                <option value="{{ $documento->id }}"
                                                    {{ old('documento_id') == $documento->id ? 'selected' : '' }}>
                                                    {{ $documento->tipo_documento }}</option>
                                            @endif
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
                                    <input type="text" class="form-control"
                                        value="{{ old('numero_documento', $proveedore->persona->numero_documento) }}"
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
                                    <input type="text" class="form-control"
                                        value="{{ old('direccion', $proveedore->persona->direccion) }}" name="direccion"
                                        required>
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
