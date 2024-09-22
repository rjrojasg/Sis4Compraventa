<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Compra;
use App\Models\Empresa;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();
        $total_usuarios = User::count();
        $total_categorias = Categoria::count();
        $total_productos = Producto::count();
        $total_proveedores = Proveedor::count();
        $total_clientes = Cliente::count();
        $total_compras = Compra::count();
        $total_ventas = Venta::count();


        $empresa_id = Auth::check() ? Auth::user()->empresa_id : redirect()->route('login')->send();
        $empresa = Empresa::where('id', $empresa_id)->first();
        return view('admin.index', compact(
            'empresa',
            'total_roles',
            'total_usuarios',
            'total_categorias',
            'total_productos',
            'total_proveedores',
            'total_clientes',
            'total_compras',
            'total_ventas'
        ));
    }
}
