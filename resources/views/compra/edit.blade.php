@extends('adminlte::page')


@section('content_header')
    <h1><b>En Proceso de Construccion</b></h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compras Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('compras.index') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Editar
                            Compra</a>
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
