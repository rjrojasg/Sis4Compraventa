@extends('adminlte::page')

@section('content_header')
    <h1><b>Compra Registrada</b></h1>

@stop
@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>
                <div class="card-body">

                    <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">

                        {{-- tipo de comprobante --}}
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-file"></i></span>
                                    <input disabled type="text" class="form-control" value="Tipo de Comprobante: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->comprobante->tipo_comprobante }}">
                            </div>
                        </div>
                        {{-- Numero de comprobante --}}
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                    <input disabled type="text" class="form-control" value="Numero de Comprobante: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->numero_comprobante }}">
                            </div>
                        </div>
                        {{-- Proveedor --}}
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-fw fa-truck"></i></span>
                                    <input disabled type="text" class="form-control" value="Proveedor: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control"
                                    value="{{ $compra->proveedor->persona->razon_social }}">
                            </div>
                        </div>
                        {{-- Proveedor --}}
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                    <input disabled type="text" class="form-control" value="Fecha: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input disabled type="text" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($compra->fecha)->format('d-m-Y') }}">
                            </div>
                        </div>
                        {{-- Impuesto --}}
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                    <input disabled type="text" class="form-control" value="Impuesto: ">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <input id="input-impuesto" disabled type="text" class="form-control"
                                    value="{{ $compra->impuesto }}">
                            </div>
                        </div>

                        {{-- Tabla --}}
                        <div class="card mb.4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Detalle de la Compra
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead class="text-white bg-primary p-1 text-center">
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio Compra</th>
                                            <th>Precio Venta</th>
                                            <th>SubTotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($compra->productos as $item)
                                            <tr>
                                                <th class="text-center">{{ $item->nombre }}</th>
                                                <th class="text-center">{{ $item->pivot->cantidad }}</th>
                                                <th class="text-center">{{ $item->pivot->precio_compra }}</th>
                                                <th class="text-center">{{ $item->pivot->precio_venta }}</th>
                                                <th class="td-subtotal">
                                                    {{ $item->pivot->cantidad * $item->pivot->precio_compra }}</th>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5"></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Sumas: </th>
                                            <th id="th-suma"></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Impuesto %</th>
                                            <th id="th-iva"></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th colspan="4">Total</th>
                                            <th id="th-total"></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>





                    </div>





                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('compras.index') }}" class = "btn btn-secondary">Volver</a>
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

@push('js')
    <script>
        //variables
        let filasSubtotal = document.getElementsByClassName('td-subtotal');
        let cont = 0;
        let impuesto = $('#input-impuesto').val();

        $(document).ready(function() {
            calcularValores();
        });

        function calcularValores() {
            for (let i = 0; i < filasSubtotal.length; i++) {
                cont += filasSubtotal[i].innerHTML;
            }

            $('#th-suma').html(cont);
            $('#th-iva').html(impuesto);
            $('#th-total').html(cont + impuesto);
        }
    </script>
@endpush

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
 --}}
    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}

@stop
