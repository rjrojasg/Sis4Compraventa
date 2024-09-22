@extends('adminlte::page')


@section('content_header')
    <h1><b>Configuraciones/Editar</b></h1>

@stop

@section('content')
    <center>
        <div class="row">
            <div class="col-md-12">

                {{-- Card Box --}}
                <div class="card  card-outline card-success" style="box-shadow: 5px 5px 5px 5px #cccccc">

                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none">
                            @yield('auth_header')
                            <b>Datos Registrados de la Empresa</b>
                        </h3>
                    </div>


                    {{-- Card Body --}}
                    <div
                        class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        <form action="{{ url('/admin/configuracion', $empresa->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="route">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre_empresa">Nombre de la Empresa</label>
                                                <input type="text" value="{{ $empresa->nombre_empresa }}"
                                                    name="nombre_empresa" class="form-control" required>
                                                @error('nombre_empresa')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipo_empresa">Tipo de la Empresa</label>
                                                <input type="text" value="{{ $empresa->tipo_empresa }}"
                                                    name="tipo_empresa" class="form-control" required>
                                                @error('tipo_empresa')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rif">Nro de Rif</label>
                                                <input type="text" value="{{ $empresa->rif }}" name="rif"
                                                    class="form-control" required>
                                                @error('rif')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="telefono">Telefono</label>
                                                <input type="text" value="{{ $empresa->telefono }}" name="telefono"
                                                    class="form-control" required>
                                                @error('telefono')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="correo">Correo Electronico</label>
                                                <input type="email" value="{{ $empresa->correo }}" name="correo"
                                                    class="form-control" required>
                                                @error('correo')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="valor_impuesto">Valor del Impuesto</label>
                                                <input type="number" value="{{ $empresa->valor_impuesto }}"
                                                    name="valor_impuesto" class="form-control" required>
                                                @error('valor_impuesto')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombre_impuesto">Nombre del Impuesto</label>
                                                <input type="text" value="{{ $empresa->nombre_impuesto }}"
                                                    name="nombre_impuesto" class="form-control" required>
                                                @error('nombre_impuesto')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="moneda">Tipo de Moneda</label>
                                                <select name="moneda" id="" class="form-control" required>
                                                    @foreach ($monedas as $moneda)
                                                        <option value="{{ $moneda->id }}"
                                                            {{ $empresa->moneda == $moneda->id ? 'selected' : '' }}>
                                                            {{ $moneda->symbol }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="direccion">Direccion</label>
                                                <input type="address" value="{{ $empresa->direccion }}" name="direccion"
                                                    class="form-control" required>
                                                @error('direccion')
                                                    <small style="color: red;">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pais">Pais</label>
                                                <select name="pais" id="select_pais" class="form-control">
                                                    @foreach ($paises as $paise)
                                                        <option value="{{ $paise->id }}"
                                                            {{ $empresa->pais == $paise->id ? 'selected' : '' }}>
                                                            {{ $paise->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="estado">Estado</label>
                                                <select name="departamento" id="select_departamento_2" class="form-control">
                                                    @foreach ($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}"
                                                            {{ $empresa->estado == $departamento->id ? 'selected' : '' }}>
                                                            {{ $departamento->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="respuesta_pais">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ciudad">Ciudad</label>
                                                <select name="ciudad" id="select_ciudad_2" class="form-control">
                                                    @foreach ($ciudades as $ciudade)
                                                        <option value="{{ $ciudade->id }}"
                                                            {{ $empresa->ciudad == $ciudade->id ? 'selected' : '' }}>
                                                            {{ $ciudade->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div id="respuesta_estado"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <button type="submit" class= "btn btn-success btn-block">Actualizar Datos
                                            Empresa</button>
                                    </div>

                                </div>


                            </div>
                    </div>
                    </form>
                </div>

                {{-- Card Footer --}}
                @hasSection('auth_footer')
                    <div
                        class="card-footer
                                                {{ config('adminlte.classes_auth_footer', '') }}">
                        @yield('auth_footer')
                    </div>
                @endif

            </div>

        </div>
    </center>

@stop

@section('css')

@stop

@section('js')
    <script>
        $('#select_pais').on('change', function() {
            var id_pais = $('#select_pais').val();
            //alert(pais);
            if (id_pais) {
                $.ajax({
                    url: "{{ url('/admin/configuracion/pais/') }}" + '/' + id_pais,
                    type: "GET",
                    success: function(data) {
                        $('#select_departamento_2').css('display', 'none');
                        $('#respuesta_pais').html(data);
                    }

                });
            } else {
                alert('Debe Seleccionar un pais');
            }
        });
    </script>


    <script>
        $(document).on('change', '#select_estado', function() {
            var id_estado = $(this).val();
            //alert(id_estado);
            if (id_estado) {
                $.ajax({
                    url: "{{ url('/admin/configuracion/estado/') }}" + '/' + id_estado,
                    type: "GET",
                    success: function(data) {
                        $('#select_ciudad_2').css('display', 'none');
                        $('#respuesta_estado').html(data);
                    }

                });
            } else {
                alert('Debe Seleccionar un Estado');
            }
        });
    </script>

@stop
