@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de Nuevo Producto</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo ">Codigo</label><b>*</b>
                                            <input type="text" class="form-control" id='codigo'
                                                value="{{ old('codigo') }}" name="codigo" required>
                                            @error('codigo')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Producto</label><b>*</b>
                                            <input type="text" class="form-control" id='nombre'
                                                value="{{ old('nombre') }}" name="nombre" required>
                                            @error('nombre')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="categorias">Categoria</label><b>*</b>
                                            <select name="categorias[]" id="categorias" class="form-control">
                                                @foreach ($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">
                                                        {{ $categoria->caracteristica->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('categorias')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control">{{ old('descripcion') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_vencimiento">Fecha de Vencimiento</label><b>*</b>
                                            <input type="date" class="form-control" id="fecha_vencimiento"
                                                value="{{ old('fecha_vencimiento') }}" name="fecha_vencimiento">
                                            @error('fecha_vencimiento')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="marca_id ">Marca</label><b>*</b>
                                            <select name="marca_id" id="marca_id" class="form-control">
                                                @foreach ($marcas as $marca)
                                                    <option value="{{ $marca->id }}"
                                                        {{ old('marca_id' == $marca->id ? 'selected' : '') }}>
                                                        {{ $marca->caracteristica->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('marca_id')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="presentacione_id ">Presentacion</label><b>*</b>
                                            <select name="presentacione_id" id="presentacione_id" class="form-control">
                                                @foreach ($presentaciones as $presentacione)
                                                    <option value="{{ $presentacione->id }}"
                                                        {{ old('presentacione_id' == $presentacione->id ? 'selected' : '') }}>
                                                        {{ $presentacione->caracteristica->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('presentacione_id')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stock">Stock</label> <b>*</b>
                                            <input type="number" class="form-control" id='stock'
                                                value="{{ old('stock') }}" name="stock" required>
                                            @error('stock')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ route('productos.index') }}" class = "btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                            Registrar</button>
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
