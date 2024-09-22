@extends('adminlte::page')


@section('content_header')
    <h1><b>Bienvenido {{ $empresa->nombre_empresa }}</b></h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ '/admin/roles' }}" class = "info-box-icon bg-info">
                    <span class=""><i class="fas fa-user-check"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Roles Registrados</span>
                    <span class="info-box-number">{{ $total_roles }}</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ '/admin/usuarios' }}" class = "info-box-icon bg-primary">
                    <span class=""><i class="fas fa-users"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios Registrados</span>
                    <span class="info-box-number">{{ $total_usuarios }}</span>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('categorias.index') }}" class = "info-box-icon bg-success">
                    <span class=""><i class="fas fa-tags"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Categorias Registradas</span>
                    <span class="info-box-number">{{ $total_categorias }}</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('productos.index') }}" class = "info-box-icon bg-danger">
                    <span class=""><i class="fas fa-list"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Productos Registradas</span>
                    <span class="info-box-number">{{ $total_productos }}</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('proveedores.index') }}" class = "info-box-icon bg-warning">
                    <span class=""><i class="fas fa-truck"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Proveedores Registradas</span>
                    <span class="info-box-number">{{ $total_proveedores }}</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('clientes.index') }}" class = "info-box-icon bg-primary">
                    <span class=""><i class="fas fa-fw fa-people-carry-box"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Clientes Registradas</span>
                    <span class="info-box-number">{{ $total_clientes }}</span>
                </div>

            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('compras.index') }}" class = "info-box-icon bg-info">
                    <span class=""><i class="fa-solid fa-store"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Compras Registradas</span>
                    <span class="info-box-number">{{ $total_compras }}</span>
                </div>

            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <a href="{{ route('ventas.index') }}" class = "info-box-icon bg-success">
                    <span class=""><i class="fas fa-fw fa-shopping-cart"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Ventas Registradas</span>
                    <span class="info-box-number">{{ $total_ventas }}</span>
                </div>

            </div>
        </div>
    </div>

    <hr>
    <hr>

    <div class="row">
        <div class="card-body col-md-2">

        </div>

        <div class="card-body col-md-4">

            <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
                <div class="info-box">
                    <a href="{{ route('compras.create') }}" class = "info-box-icon bg-info">
                        <span class=""><i class="fa-solid fa-store"></i></span>
                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Realizar una Compra</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body col-md-4">

            <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
                <div class="info-box">
                    <a href="{{ route('ventas.create') }}" class = "info-box-icon bg-success">
                        <span class=""><i class="fas fa-fw fa-shopping-cart"></i></span>
                    </a>
                    <div class="info-box-content">
                        <span class="info-box-text">Realizar una Venta</span>
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
