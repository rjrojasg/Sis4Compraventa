<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresentacioneRequest;
use App\Http\Requests\UpdatePresentacioneRequest;
use App\Models\Caracteristica;
use App\Models\presentacione;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresentacioneController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-presentacione|crear-presentacione|editar-presentacione|eliminar-presentacione', ['only' => ['index']]);
        $this->middleware('permission:crear-presentacione', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-presentacione', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-presentacione', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentaciones = presentacione::with('caracteristica')->get();
        return view('presentaciones.index', compact('presentaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('presentaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePresentacioneRequest $request)
    {
        try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::create($request->validated());
            $caracteristica->presentacione()->create([
                'caracteristica_id' => $caracteristica->id
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('presentaciones.index')
            ->with('mensaje', 'Se Registro la Categoria de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $presentacione = presentacione::find($id);
        return view('presentaciones.show', ['presentacione' => $presentacione]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(presentacione $presentacione)
    {
        return view('presentaciones.edit', ['presentacione' => $presentacione]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresentacioneRequest $request, presentacione $presentacione)
    {
        Caracteristica::where('id', $presentacione->caracteristica->id)
            ->update($request->validated());

        return redirect()->route('presentaciones.index')
            ->with('mensaje', 'Se Modifico la Presentacion de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        presentacione::destroy($id);
        return redirect()->route('presentaciones.index')
            ->with('mensaje', 'Se Elimino la Categoria de la manera Correcta')
            ->with('icono', 'success');
    }
}
