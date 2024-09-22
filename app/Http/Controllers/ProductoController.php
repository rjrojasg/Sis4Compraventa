<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\presentacione;
use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-producto|crear-producto|editar-producto|eliminar-producto', ['only' => ['index']]);
        $this->middleware('permission:crear-producto', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-producto', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-producto', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with(['marca.caracteristica', 'categorias.caracteristica', 'presentacione.caracteristica'])->latest()->get();
        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        $presentaciones = presentacione::all();
        $categorias = Categoria::all();
        return view('producto.create', compact('marcas', 'presentaciones', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        try {
            DB::beginTransaction();

            $producto = new Producto();

            $producto->fill([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'stock' => $request->stock,
                'descripcion' => $request->descripcion,
                'fecha_vencimiento' => $request->fecha_vencimiento,
                'marca_id' => $request->marca_id,
                'presentacione_id' => $request->presentacione_id
            ]);

            $producto->save();

            // se llena tabla Categoria_producto

            $categorias = $request->get('categorias');
            $producto->categorias()->attach($categorias);


            DB::commit();
        } catch (Exception $e) {
            dd($e);
            DB::rollBack();
        }
        return redirect()->route('productos.index')
            ->with('mensaje', 'Se Registro el Producto de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {

        $marcas = Marca::all();
        $presentaciones = presentacione::all();
        $categorias = Categoria::all();
        return view('producto.edit', compact('producto', 'marcas', 'presentaciones', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        try {
            DB::beginTransaction();

            $producto->fill([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'stock' => $request->stock,
                'descripcion' => $request->descripcion,
                'fecha_vencimiento' => $request->fecha_vencimiento,
                'marca_id' => $request->marca_id,
                'presentacione_id' => $request->presentacione_id
            ]);

            $producto->save();

            // se llena tabla Categoria_producto

            $categorias = $request->get('categorias');
            $producto->categorias()->sync($categorias);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        return redirect()->route('productos.index')
            ->with('mensaje', 'Se Modifico el Producto de la manera Correcta')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index')
            ->with('mensaje', 'Se Elimino el Producto de la manera Correcta')
            ->with('icono', 'success');
    }
}
