@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="container">


        <center><img src="{{ asset('/images/logo.jpg') }}" width="250px" alt=""></center>
        <br>
        <center>
            <div class="row">
                <div class="col-md-12">

                    {{-- Card Box --}}
                    <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}"
                        style="box-shadow: 5px 5px 5px 5px #cccccc">

                        <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                            <h3 class="card-title float-none text-center">
                                @yield('auth_header')
                                Registro de una nueva Empresa
                            </h3>
                        </div>


                        {{-- Card Body --}}
                        <div
                            class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                            <form action="{{ url('crear-empresa/create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="route">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nombre_empresa">Nombre de la Empresa</label>
                                                    <input type="text" value="{{ old('nombre_empresa') }}"
                                                        name="nombre_empresa" class="form-control" required>
                                                    @error('nombre_empresa')
                                                        <small style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tipo_empresa">Tipo de la Empresa</label>
                                                    <input type="text" value="{{ old('tipo_empresa') }}"
                                                        name="tipo_empresa" class="form-control" required>
                                                    @error('tipo_empresa')
                                                        <small style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="rif">Nro de Rif</label>
                                                    <input type="text" value="{{ old('rif') }}" name="rif"
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
                                                    <input type="text" value="{{ old('telefono') }}" name="telefono"
                                                        class="form-control" required>
                                                    @error('telefono')
                                                        <small style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="correo">Correo Electronico</label>
                                                    <input type="email" value="{{ old('correo') }}" name="correo"
                                                        class="form-control" required>
                                                    @error('correo')
                                                        <small style="color: red;">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="moneda">Tipo de Moneda</label>
                                                    <select name="moneda" id="" class="form-control" required>
                                                        @foreach ($monedas as $moneda)
                                                            <option value="{{ $moneda->id }}">{{ $moneda->symbol }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="direccion">Direccion</label>
                                                    <input type="address" value="{{ old('direccion') }}" name="direccion"
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
                                                            <option value="{{ $paise->id }}">{{ $paise->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="estado">Estado</label>
                                                    <div id="respuesta_pais">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ciudad">Ciudad</label>
                                                    <div id="respuesta_estado"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">

                                        <div class="col-md-4">
                                            <button type="submit" class= "btn btn-lg btn-primary btn-block">Crear
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

    @section('adminlte_js')
        @stack('js')
        @yield('js')

        <script>
            $('#select_pais').on('change', function() {
                var id_pais = $('#select_pais').val();
                //alert(pais);
                if (id_pais) {
                    $.ajax({
                        url: "{{ url('/crear-empresa/pais/') }}" + '/' + id_pais,
                        type: "GET",
                        success: function(data) {
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
                        url: "{{ url('/crear-empresa/estado/') }}" + '/' + id_estado,
                        type: "GET",
                        success: function(data) {
                            $('#respuesta_estado').html(data);
                        }

                    });
                } else {
                    alert('Debe Seleccionar un Estado');
                }
            });
        </script>

    @stop
