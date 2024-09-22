@extends('adminlte::page')

@section('content_header')
    <h1><b>Modificar Datos de Producto</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los Datos</h3>

                </div>

                <div class="card-body">
                    <form action="{{ route('productos.update', ['producto' => $producto]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="codigo ">Codigo</label><b>*</b>
                                            <input type="text" class="form-control" id='codigo'
                                                value="{{ old('codigo', $producto->codigo) }}" name="codigo" required>
                                            @error('codigo')
                                                <small style="color: red;">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Producto</label><b>*</b>
                                            <input type="text" class="form-control" id='nombre'
                                                value="{{ old('nombre', $producto->nombre) }}" name="nombre" required>
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
                                                    @if (in_array($categoria->id, $producto->categorias->pluck('id')->toArray()))
                                                        <option selected value="{{ $categoria->id }}">
                                                            {{ $categoria->caracteristica->nombre }}</option>
                                                    @else
                                                        <option value="{{ $categoria->id }}">
                                                            {{ $categoria->caracteristica->nombre }}</option>
                                                    @endif
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
                                            <textarea name="descripcion" id="descripcion" cols="30" rows="2" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="fecha_vencimiento">Fecha de Vencimiento</label><b>*</b>
                                            <input type="date" class="form-control" id="fecha_vencimiento"
                                                value="{{ old('fecha_vencimiento', $producto->fecha_vencimiento) }}"
                                                name="fecha_vencimiento">
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
                                                    @if ($producto->marca_id == $marca->id)
                                                        <option selected value="{{ $marca->id }}"
                                                            {{ old('marca_id' == $marca->id ? 'selected' : '') }}>
                                                            {{ $marca->caracteristica->nombre }}</option>
                                                    @else
                                                        <option value="{{ $marca->id }}"
                                                            {{ old('marca_id' == $marca->id ? 'selected' : '') }}>
                                                            {{ $marca->caracteristica->nombre }}</option>
                                                    @endif
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
                                                    @if ($producto->presentacione_id == $presentacione->id)
                                                        <option selected value="{{ $presentacione->id }}"
                                                            {{ old('presentacione_id' == $presentacione->id ? 'selected' : '') }}>
                                                            {{ $presentacione->caracteristica->nombre }}</option>
                                                    @else
                                                        <option value="{{ $presentacione->id }}"
                                                            {{ old('presentacione_id' == $presentacione->id ? 'selected' : '') }}>
                                                            {{ $presentacione->caracteristica->nombre }}</option>
                                                    @endif
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
                                                value="{{ old('stock', $producto->stock) }}" name="stock" required>
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
