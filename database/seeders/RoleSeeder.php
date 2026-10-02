<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insertOrIgnore([
            [
                'nombre_rol' => 'ADMINISTRADOR',
                'descripcion' => 'Acceso total a la configuración, préstamos, reportes y gestión de usuarios',
            ],
            [
                'nombre_rol' => 'COBRADOR',
                'descripcion' => 'Registro y gestión de cobros de cuotas y consulta de clientes',
            ],
            [
                'nombre_rol' => 'CLIENTE',
                'descripcion' => 'Acceso de lectura para consulta del estado de sus préstamos y plan de pagos',
            ],
        ]);
    }
}
