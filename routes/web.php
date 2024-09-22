<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\PresentacioneController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para Empresas
Route::get('/crear-empresa', [EmpresaController::class, 'create'])->name('admin.empresas.create');
Route::get('/crear-empresa/pais/{id_pais}', [EmpresaController::class, 'buscar_estado'])->name('admin.empresas.create.buscar_estado1');
Route::get('/crear-empresa/estado/{id_estado}', [EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.create.buscar_ciudad1');
Route::post('/crear-empresa/create', [EmpresaController::class, 'store'])->name('admin.empresas.store');

//Rutas para Configuraciones
Route::get('/admin/configuracion', [EmpresaController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
Route::get('/admin/configuracion/pais/{id_pais}', [EmpresaController::class, 'buscar_estado'])->name('admin.empresas.create.buscar_estado');
Route::get('/admin/configuracion/estado/{id_estado}', [EmpresaController::class, 'buscar_ciudad'])->name('admin.empresas.create.buscar_ciudad');
Route::put('/admin/configuracion/{id}', [EmpresaController::class, 'update'])->name('admin.configuracion.update');

//Rutas para Roles
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

//Rutas para Usuarios
Route::get('/admin/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

//Rutas para Categorias, 
Route::resource('categorias', CategoriaController::class)->middleware('auth');

//Rutas para Presentaciones
Route::resource('presentaciones', PresentacioneController::class)->middleware('auth');

//Rutas para Marcas
Route::resource('marcas', MarcaController::class)->middleware('auth');

//Rutas para Productos
Route::resource('productos', ProductoController::class)->middleware('auth');

//Rutas para Clientes
Route::resource('clientes', ClienteController::class)->middleware('auth');

//Rutas para Proveedores
Route::resource('proveedores', ProveedorController::class)->middleware('auth');

//Rutas para Compras
Route::resource('compras', CompraController::class)->middleware('auth');

//Rutas para Ventas
Route::resource('ventas', VentaController::class)->middleware('auth');

//Rutas para Reportes
Route::resource('reportes', ReporteController::class)->middleware('auth');
Route::get('/reporte/reporteCompraTotales', [ReporteController::class, 'reporteCompraTotales'])->name('reportes.reporteCompraTotales')->middleware('auth');
Route::get('/reporte/reporteCompraMes', [ReporteController::class, 'reporteCompraMes'])->name('reportes.reporteCompraMes')->middleware('auth');
Route::get('/reporte/reporteVentaTotales', [ReporteController::class, 'reporteVentaTotales'])->name('reportes.reporteVentaTotales')->middleware('auth');
Route::get('/reporte/reporteVentaMes', [ReporteController::class, 'reporteVentaMes'])->name('reportes.reporteVentaMes')->middleware('auth');
Route::get('/reporte/reporteProdMasVend', [ReporteController::class, 'reporteProdMasVend'])->name('reportes.reporteProdMasVend')->middleware('auth');
