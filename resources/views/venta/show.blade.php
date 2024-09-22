@extends('adminlte::page')

@section('content_header')
    <h1><b>Venta Registrada</b></h1>

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

                        <div class="card mb-4">

                            <div class="card-header">
                                Datos generales de la venta
                            </div>

                            <div class="card-body">

                                <!---Tipo comprobante--->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file"></i></span>
                                            <input disabled type="text" class="form-control"
                                                value="Tipo de comprobante: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Tipo de comprobante" id="icon-form"
                                                class="input-group-text"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ $venta->comprobante->tipo_comprobante }}">
                                        </div>
                                    </div>
                                </div>

                                <!---Numero comprobante--->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                            <input disabled type="text" class="form-control"
                                                value="Número de comprobante: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Número de comprobante" id="icon-form"
                                                class="input-group-text"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ $venta->numero_comprobante }}">
                                        </div>
                                    </div>
                                </div>

                                <!---Cliente--->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                            <input disabled type="text" class="form-control" value="Cliente: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Cliente" class="input-group-text" id="icon-form"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ $venta->cliente->persona->razon_social }}">
                                        </div>
                                    </div>
                                </div>

                                <!---Usuario-->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            <input disabled type="text" class="form-control" value="Vendedor: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Vendedor" class="input-group-text" id="icon-form"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ $venta->user->name }}">
                                        </div>
                                    </div>
                                </div>

                                <!---Fecha--->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input disabled type="text" class="form-control" value="Fecha: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Fecha" class="input-group-text" id="icon-form"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($venta->fecha_hora)->format('d-m-Y') }}">
                                        </div>
                                    </div>
                                </div>

                                <!---Hora-->
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                                            <input disabled type="text" class="form-control" value="Hora: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Hora" class="input-group-text" id="icon-form"></span>
                                            <input disabled type="text" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($venta->fecha_hora)->format('H:i') }}">
                                        </div>

                                    </div>
                                </div>

                                <!---Impuesto--->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group" id="hide-group">
                                            <span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
                                            <input disabled type="text" class="form-control" value="Impuesto: ">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span title="Impuesto" class="input-group-text" id="icon-form"></span>
                                            <input id="input-impuesto" disabled type="text" class="form-control"
                                                value="{{ $venta->impuesto }}">
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>


                        <!---Tabla--->
                        <div class="card mb-2">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de detalle de la venta
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead class="bg-primary text-white">
                                        <tr class="align-top">
                                            <th class="">Producto</th>
                                            <th class="">Cantidad</th>
                                            <th class="">Precio de venta</th>
                                            <th class="">Descuento</th>
                                            <th class="">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($venta->productos as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->nombre }}
                                                </td>
                                                <td>
                                                    {{ $item->pivot->cantidad }}
                                                </td>
                                                <td>
                                                    {{ $item->pivot->precio_venta }}
                                                </td>
                                                <td>
                                                    {{ $item->pivot->descuento }}
                                                </td>
                                                <td class="td-subtotal">
                                                    {{ $item->pivot->cantidad * $item->pivot->precio_venta - $item->pivot->descuento }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Sumas:</th>
                                            <th id="th-suma"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">IGV:</th>
                                            <th id="th-igv"></th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">Total:</th>
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
                            <a href="{{ route('ventas.index') }}" class = "btn btn-secondary">Volver</a>
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
        //Variables
        let filasSubtotal = document.getElementsByClassName('td-subtotal');
        let cont = 0;
        let impuesto = $('#input-impuesto').val();

        $(document).ready(function() {
            calcularValores();
        });

        function calcularValores() {
            for (let i = 0; i < filasSubtotal.length; i++) {
                cont += parseFloat(filasSubtotal[i].innerHTML);
            }

            $('#th-suma').html(cont);
            $('#th-igv').html(impuesto);
            $('#th-total').html(round(cont + parseFloat(impuesto)));
        }

        function round(num, decimales = 2) {
            var signo = (num >= 0 ? 1 : -1);
            num = num * signo;
            if (decimales === 0) //con 0 decimales
                return signo * Math.round(num);
            // round(x * 10 ^ decimales)
            num = num.toString().split('e');
            num = Math.round(+(num[0] + 'e' + (num[1] ? (+num[1] + decimales) : decimales)));
            // x * 10 ^ (-decimales)
            num = num.toString().split('e');
            return signo * (num[0] + 'e' + (num[1] ? (+num[1] - decimales) : -decimales));
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
