@extends('adminlte::page')

@section('content_header')
    <h1><b>Registro de nueva Compra</b></h1>

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

                <div class="card-body">
                    <form action="{{ route('compras.store') }}" method="POST">
                        @csrf

                        <div class="contenier mt-4">
                            <div class="row gy-4">
                                {{-- compra producto  --}}
                                <div class="col-md-8">
                                    <div class="text-white bg-primary p-1 text-center">Detalles de la Compra
                                    </div>
                                    <div class="p-3 border border-3 border-primary">
                                        <div class="row">
                                            {{-- Producto --}}
                                            <div class="col-md-12 mb-4">
                                                <label for="producto_id">Producto</label><b>*</b>
                                                <select name="producto_id" id="producto_id"
                                                    class="form-control selectpicker show-tick" title="Selecciona">
                                                    <option value="" selected>Selecciona</option>
                                                    @foreach ($productos as $producto)
                                                        <option value="{{ $producto->id }}">
                                                            {{ $producto->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- Cantidad --}}
                                            <div class="col-md-4 mb-2">
                                                <label for="cantidad">Cantidad</label><b>*</b>
                                                <input required type="number" name="cantidad" id="cantidad"
                                                    class="form-control">
                                            </div>
                                            {{-- Precio de Compra --}}
                                            <div class="col-md-4 mb-2">
                                                <label for="precio_compra">Precio de Compra</label><b>*</b>
                                                <input required type="number" name="precio_compra" id="precio_compra"
                                                    class="form-control" step="0.1">
                                            </div>
                                            {{-- Precio de Venta --}}
                                            <div class="col-md-4 mb-2">
                                                <label for="precio_venta">Precio de Venta</label><b>*</b>
                                                <input required type="number" name="precio_venta" id="precio_venta"
                                                    class="form-control" step="0.1">
                                            </div>
                                            {{-- Botones --}}
                                            <div class="col-md-12 mb-2 mt-2 text-end">
                                                <button id="btn_agregar" type="button" class="btn btn-primary">
                                                    Agregar</button>
                                            </div>
                                            {{-- Tabla para Detalle de la Compra --}}
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="tabla_detalle" class="table table-hover">
                                                        <thead class="text-white bg-primary p-1 text-center">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Producto</th>
                                                                <th>Cantidad</th>
                                                                <th>Precio Compra</th>
                                                                <th>Precio Venta</th>
                                                                <th>SubTotal</th>
                                                                <th><button type="button"><i
                                                                            class="fa-solid fa-trash"></i></button></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th></th>
                                                                <th colspan="4">Sumas</th>
                                                                <th colspan="2"><span id="sumas">0</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th colspan="4">Impuesto %</th>
                                                                <th colspan="2"><span id="iva">0</span></th>
                                                            </tr>
                                                            <tr>
                                                                <th></th>
                                                                <th colspan="4">Total</th>
                                                                <th colspan="2"><input type="hidden" name="total"
                                                                        value="0" id="inputTotal"> <span
                                                                        id="total">0</span></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>

                                            {{-- Boton para Cancelar la Compra --}}
                                            <div class="col-md-12 mb-2 mt-2 text-end">
                                                <button id="cancelar" type="button" class="btn btn-danger"
                                                    data-toggle="modal" data-target="#exampleModalCenter">
                                                    Cancelar Compra</button>
                                            </div>


                                        </div>

                                    </div>

                                </div>

                                {{-- Producto  --}}
                                <div class="col-md-4">
                                    <div class="text-white bg-success p-1 text-center">Datos Generales
                                    </div>
                                    <div class="p-3 border border-3 border-success">
                                        <div class="row">
                                            {{-- Proveedor --}}
                                            <div class="col-md-12 mb-2">
                                                <label for="proveedor_id">Proveedor</label><b>*</b>
                                                <select name="proveedor_id" id="proveedor_id"
                                                    class="form-control selectpicker show-tick" title="Selecciona">
                                                    <option value="" selected>Selecciona</option>
                                                    @foreach ($proveedor as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('proveedor_id') == $item->persona->id ? 'selected' : '' }}>
                                                            {{ $item->persona->razon_social }}</option>
                                                    @endforeach
                                                </select>
                                                @error('proveedor_id')
                                                    <small class="text-danger">{{ '*' . $message }}</small>
                                                @enderror
                                            </div>
                                            {{-- Tipo de Comprobante --}}
                                            <div class="col-md-12 mb-2">
                                                <label for="comprobante_id">Comprobante</label><b>*</b>
                                                <select name="comprobante_id" id="comprobante_id"
                                                    class="form-control selectpicker show-tick" title="Selecciona">
                                                    <option value="" selected>Selecciona</option>
                                                    @foreach ($comprobantes as $comprobante)
                                                        <option value="{{ $comprobante->id }}"
                                                            {{ old('comprobante_id') == $comprobante->id ? 'selected' : '' }}>
                                                            {{ $comprobante->tipo_comprobante }}</option>
                                                    @endforeach
                                                </select>
                                                @error('comprobante_id')
                                                    <small class="text-danger">{{ '*' . $message }}</small>
                                                @enderror
                                            </div>

                                            {{-- Numero de Comprobante --}}
                                            <div class="col-md-12 mb-2">
                                                <label for="numero_comprobante">Nro de Comprobante</label><b>*</b>
                                                <input required type="text" name="numero_comprobante"
                                                    id="numero_comprobante" class="form-control">
                                            </div>
                                            @error('numero_comprobante')
                                                <small class="text-danger">{{ '*' . $message }}</small>
                                            @enderror

                                            {{-- Impuesto --}}
                                            <div class="col-md-6 mb-2">
                                                <label for="impuesto">Impuesto</label><b>*</b>
                                                <input readonly value="16" type="text" name="impuesto"
                                                    id="impuesto" class="form-control border-success">
                                                @error('impuesto')
                                                    <small class="text-danger">{{ '*' . $message }}</small>
                                                @enderror
                                            </div>

                                            {{-- Fecha --}}
                                            <div class="col-md-6 mb-2">
                                                <label for="fecha">Fecha</label><b>*</b>
                                                <input type="date" name="fecha" id="fecha"
                                                    class="form-control border-success" value="">
                                            </div>

                                            {{-- Botones --}}
                                            <div class="col-md-12 mb-2 text-center">

                                                <button type="submit" class="btn btn-success" id="guardar">
                                                    Guardar</button>
                                            </div>

                                        </div>
                                    </div>


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
                </form>


            </div>

        </div>
        <!-- Modal para Cancelar la Compra-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal de Confirmacion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Seguro que Quieres Cancelar la Compra?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                        <button id="btnCancelarCompra" type="button" class="btn btn-danger"
                            data-dismiss="modal">Confirmar</button>
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
        $(document).ready(function() {
            $('#btn_agregar').click(function() {
                agregarProducto();
            });
            $('#btnCancelarCompra').click(function() {
                cancelarCompra();
            });

            disableButtons();
        });

        //variables
        let cont = 0;
        let subtotal = [];
        let sumas = 0;
        let iva = 0;
        let total = 0;

        //constantes
        const impuesto = 16;

        function cancelarCompra() {
            $('#tabla_detalle > tbody').empty();

            let fila = '<tr>' +
                '<th></th>' +
                '<th></th>' +
                '<th></th>' +
                '<th></th>' +
                '<th></th>' +
                '<th></th>' +
                '<th></th>' +
                '</tr>';
            $('#tabla_detalle').append(fila);
            //reiniciar variables
            cont = 0;
            subtotal = [];
            sumas = 0;
            iva = 0;
            total = 0;

            //mostrar los campos
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#inputTotal').val(total);

            disableButtons();

        }

        function disableButtons() {
            if (total == 0) {
                $('#guardar').hide();
                $('#cancelar').hide();
            } else {
                $('#guardar').show();
                $('#cancelar').show();
            }
        }

        function agregarProducto() {
            let idProducto = $('#producto_id').val();
            let nameProducto = $('#producto_id option:selected').text();
            let cantidad = $('#cantidad').val();
            let precioCompra = $('#precio_compra').val();
            let precioVenta = $('#precio_venta').val();

            //validaciones 01- que no quede campo vacio
            if (nameProducto != '' && cantidad != '' && precioCompra != '' && precioVenta != '') {

                //validaciones 02- que no coloquen valores negativos
                if (parseInt(cantidad) > 0 && parseFloat(precioCompra) > 0 && parseFloat(precioVenta) > 0) {

                    //validaciones 03 - que precio de Venta sea Mayor a Precio de Compra
                    if (parseFloat(precioVenta) > parseFloat(precioCompra)) {
                        //calcular valores
                        subtotal[cont] = cantidad * precioCompra;
                        sumas += subtotal[cont];
                        iva = sumas / 100 * 16;
                        total = sumas + iva;

                        //crear la fila
                        let fila = '<tr id="fila' + cont + '">' +
                            '<th>' + (cont + 1) + '</th>' +
                            '<td><input type="hidden" name="arrayidproducto[]" value="' + idProducto + '">' + nameProducto +
                            '</td>' +
                            '<td><input type="hidden" name="arraycantidad[]" value="' + cantidad + '">' + cantidad +
                            '</td>' +
                            '<td><input type="hidden" name="arrayprecioCompra[]" value="' + precioCompra + '">' +
                            precioCompra + '</td>' +
                            '<td><input type="hidden" name="arrayprecioVenta[]" value="' + precioVenta + '">' +
                            precioVenta +
                            '</td>' +
                            '<td>' + subtotal[cont] + '</td>' +
                            '<td><button type="button" onClick="eliminarProducto(' + cont +
                            ')"><i class="fa-solid fa-trash"></i></button></td>' + '</tr>';

                        //acciones despues de añadir fila
                        $('#tabla_detalle').append(fila);
                        cont++;
                        disableButtons();

                        //mostrar los campos calculados
                        $('#sumas').html(sumas);
                        $('#iva').html(iva);
                        $('#total').html(total);
                        $('#inputTotal').val(total);

                    } else {
                        showModal('Precio de Venta Incorrecto');
                    }

                } else {
                    showModal('Valores Incorrectos');
                }

            } else {
                showModal('Le faltan Campos por Completar');
            }

        }

        function eliminarProducto(indice) {
            //calcular valores
            sumas -= subtotal[indice];
            iva = sumas / 100 * 16;
            total = sumas + iva;
            //mostrar los campos calculados
            $('#sumas').html(sumas);
            $('#iva').html(iva);
            $('#total').html(total);
            $('#inputTotal').val(total);
            //eliminar fila de la table
            $('#fila' + indice).remove();

        }

        function showModal(message, icon = 'error') {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: icon,
                title: message
            });
        }
    </script>
@endpush


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> --}}

@stop
