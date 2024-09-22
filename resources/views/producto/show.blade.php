@extends('adminlte::page')

@section('content_header')
    <h1>
        <b>Datos del Producto</b>
    </h1>

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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="codigo ">Codigo</label>
                                        <p>{{ $producto->codigo }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre del Producto</label>
                                        <p>{{ $producto->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="categorias">Categoria</label>
                                        <p>
                                            @foreach ($producto->categorias as $category)
                                                <div class="contenier">
                                                    <div class="row">
                                                        {{ $category->caracteristica->nombre }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <p>{{ $producto->descripcion }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                                        <p>{{ $producto->fecha_vencimiento }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="marca_id ">Marca</label>
                                        <p>{{ $producto->marca->caracteristica->nombre }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="presentacione_id ">Presentacion</label>
                                        <p>{{ $producto->presentacione->caracteristica->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="stock">Stock</label>
                                        <p>{{ $producto->stock }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ route('productos.index') }}" class = "btn btn-secondary">Volver</a>
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
