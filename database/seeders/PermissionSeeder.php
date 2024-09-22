<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [

            //categorías
            'ver-categoria',
            'crear-categoria',
            'editar-categoria',
            'eliminar-categoria',

            //Cliente
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'eliminar-cliente',

            //Compra
            'ver-compra',
            'crear-compra',
            'mostrar-compra',
            'eliminar-compra',

            //Marca
            'ver-marca',
            'crear-marca',
            'editar-marca',
            'eliminar-marca',

            //Presentacione
            'ver-presentacione',
            'crear-presentacione',
            'editar-presentacione',
            'eliminar-presentacione',

            //Producto
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'eliminar-producto',

            //Proveedor
            'ver-proveedor',
            'crear-proveedor',
            'editar-proveedor',
            'eliminar-proveedor',

            //Venta
            'ver-venta',
            'crear-venta',
            'mostrar-venta',
            'eliminar-venta',

            //Roles
            'ver-role',
            'crear-role',
            'editar-role',
            'eliminar-role',

            //User
            'ver-user',
            'crear-user',
            'editar-user',
            'eliminar-user',

            //Empresa
            'ver-empresa',
            'crear-empresa',
            'editar-empresa',


            //Perfil 
            'ver-perfil',
            'editar-perfil'
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
