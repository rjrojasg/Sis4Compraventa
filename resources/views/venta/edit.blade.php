@extends('adminlte::page')


@section('content_header')
    <h1><b>En Proceso de Construccion</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Venta Registrada</h3>
                    <div class="card-tools">
                        <a href="{{ route('ventas.index') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Editar
                            Venta</a>
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
