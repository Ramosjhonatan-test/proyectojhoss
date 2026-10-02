<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\RoleSeeder;
use Tests\TestCase;

class FinanceSchemaTest extends TestCase
{
    use RefreshDatabase;

    public function test_finance_tables_are_created(): void
    {
        foreach ([
            'roles',
            'usuarios',
            'clientes',
            'prestamos',
            'plan_cuotas',
            'pagos',
            'garantias',
            'bitacora_auditoria',
        ] as $table) {
            $this->assertTrue(Schema::hasTable($table), "The {$table} table should exist.");
        }

        $this->seed(RoleSeeder::class);

        $this->assertSame([
            'ADMINISTRADOR',
            'COBRADOR',
            'CLIENTE',
        ], DB::table('roles')->orderBy('id_rol')->pluck('nombre_rol')->all());
    }
}
