<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        return view('admin.empresas.create', compact('paises', 'estados', 'ciudades', 'monedas'));
    }

    public function buscar_estado($id_pais)
    {
        try {
            $estados = DB::table('states')->where('country_id', $id_pais)->get();
            return view('admin.empresas.cargar_estados', compact('estados'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }

    public function buscar_ciudad($id_estado)
    {
        try {
            $ciudades = DB::table('cities')->where('state_id', $id_estado)->get();
            return view('admin.empresas.cargar_ciudades', compact('ciudades'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'rif' => 'required|unique:empresas',
            'telefono' => 'required',
            'correo' => 'required|unique:empresas',
            'moneda' => 'required',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
        ]);

        $empresa = new Empresa();

        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->rif = $request->rif;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->pais = $request->pais;
        $empresa->estado = $request->estado;
        $empresa->ciudad = $request->ciudad;

        $empresa->save();

        $usuario = new User();

        $usuario->name = "Admin";
        $usuario->email = $request->correo;
        $usuario->password = Hash::make($request['rif']);
        $usuario->empresa_id = $empresa->id;
        $usuario->save();

        $usuario->assignRole('administrador');

        Auth::login($usuario);

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se Registro la Empresa de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        $paises = DB::table('countries')->get();
        $estados = DB::table('states')->get();
        //$ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresa_id)->first();
        $departamentos = DB::table('states')->where('country_id', $empresa->pais)->get();
        $ciudades = DB::table('cities')->where('state_id', $empresa->estado)->get();
        return view('admin.configuraciones.edit', compact('paises', 'estados', 'monedas', 'empresa', 'departamentos', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'rif' => 'required|unique:empresas,rif,' . $id,
            'telefono' => 'required',
            'correo' => 'required|unique:empresas,correo,' . $id,
            'moneda' => 'required',
            'direccion' => 'required',
            'pais' => 'required',
            'estado' => 'required',
            'ciudad' => 'required',
        ]);

        $empresa = Empresa::find($id);

        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->rif = $request->rif;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->pais = $request->pais;
        $empresa->estado = $request->estado;
        $empresa->ciudad = $request->ciudad;

        $empresa->save();

        $usuario_id = Auth::user()->id;
        $usuario = User::find($usuario_id);
        $usuario->name = "Admin";
        $usuario->email = $request->correo;
        $usuario->password = Hash::make($request['rif']);
        $usuario->empresa_id = $empresa->id;
        $usuario->save();

        return redirect()->route('admin.index')
            ->with('mensaje', 'Se Modificaron los datos de la Empresa de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
