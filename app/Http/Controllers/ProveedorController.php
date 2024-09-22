<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Documento;
use App\Models\Empresa;
use App\Models\Persona;
use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-proveedor|crear-proveedor|editar-proveedor|eliminar-proveedor', ['only' => ['index']]);
        $this->middleware('permission:crear-proveedor', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proveedor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-proveedor', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::with(['persona.documento'])->latest()->get();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documentos = Documento::all();
        return view('proveedores.create', compact('documentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProveedorRequest $request)
    {

        try {
            DB::beginTransaction();
            $proveedore = Persona::create($request->validated());
            $proveedore->proveedor()->create([
                'persona_id' => $proveedore->id
            ]);

            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }

        return redirect()->route('proveedores.index')
            ->with('mensaje', 'Se Registro el Proveedor de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);
        return view('proveedores.show', ['proveedor' => $proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedore)
    {

        $proveedore->load('persona.documento');
        $documentos = Documento::all();
        return view('proveedores.edit', compact('proveedore', 'documentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProveedorRequest $request, Proveedor $proveedore)
    {
        try {
            DB::beginTransaction();
            Persona::where('id', $proveedore->persona->id)
                ->update($request->validated());

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('proveedores.index')
            ->with('mensaje', 'Se Modifico el Proveedor de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Proveedor::destroy($id);
        return redirect()->route('proveedores.index')
            ->with('mensaje', 'Se Elimino el Proveedor de la manera Correcta')
            ->with('icono', 'success');
    }
}
