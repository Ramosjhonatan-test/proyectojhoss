<?php

namespace Tests\Feature;

use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FinanceAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_registration_creates_a_hashed_client_account(): void
    {
        $this->seed(RoleSeeder::class);
        $adminRoleId = DB::table('roles')->where('nombre_rol', 'ADMINISTRADOR')->value('id_rol');

        $this->post('/register', [
            'nombre' => 'Ana',
            'apellido' => 'Lopez',
            'correo' => 'ana@example.test',
            'password' => 'StrongPass123!',
            'password_confirmation' => 'StrongPass123!',
            'id_rol' => $adminRoleId,
        ])->assertRedirect('/dashboard/cliente');

        $user = DB::table('usuarios')->where('correo', 'ana@example.test')->first();
        $clientRoleId = DB::table('roles')->where('nombre_rol', 'CLIENTE')->value('id_rol');

        $this->assertNotNull($user);
        $this->assertSame($clientRoleId, $user->id_rol);
        $this->assertTrue(Hash::check('StrongPass123!', $user->password_hash));
    }

    public function test_login_redirects_to_the_dashboard_for_the_users_role(): void
    {
        $this->seed(RoleSeeder::class);
        $clientRoleId = DB::table('roles')->where('nombre_rol', 'CLIENTE')->value('id_rol');
        DB::table('usuarios')->insert([
            'id_rol' => $clientRoleId,
            'nombre' => 'Carlos',
            'apellido' => 'Rivera',
            'correo' => 'carlos@example.test',
            'password_hash' => Hash::make('StrongPass123!'),
            'estado' => 'ACTIVO',
        ]);

        $this->post('/login', [
            'correo' => 'carlos@example.test',
            'password' => 'StrongPass123!',
        ])->assertRedirect('/dashboard/cliente');

        $this->get('/dashboard/cliente')
            ->assertOk()
            ->assertSee('Panel del cliente');
    }

    public function test_login_rejects_a_password_hash_from_an_incompatible_algorithm_without_server_error(): void
    {
        $this->seed(RoleSeeder::class);
        $clientRoleId = DB::table('roles')->where('nombre_rol', 'CLIENTE')->value('id_rol');
        DB::table('usuarios')->insert([
            'id_rol' => $clientRoleId,
            'nombre' => 'Cuenta',
            'apellido' => 'Heredada',
            'correo' => 'legacy@example.test',
            'password_hash' => 'not-a-bcrypt-hash',
            'estado' => 'ACTIVO',
        ]);

        $this->post('/login', [
            'correo' => 'legacy@example.test',
            'password' => 'any-password',
        ])->assertRedirect('/login')->assertSessionHasErrors('correo');
    }

    public function test_login_uses_the_role_dashboard_instead_of_another_intended_dashboard(): void
    {
        $this->seed(RoleSeeder::class);
        $clientRoleId = DB::table('roles')->where('nombre_rol', 'CLIENTE')->value('id_rol');
        DB::table('usuarios')->insert([
            'id_rol' => $clientRoleId,
            'nombre' => 'Elena',
            'apellido' => 'Soto',
            'correo' => 'elena@example.test',
            'password_hash' => Hash::make('StrongPass123!'),
            'estado' => 'ACTIVO',
        ]);

        $this->get('/dashboard/administrador')->assertRedirect('/login');

        $this->post('/login', [
            'correo' => 'elena@example.test',
            'password' => 'StrongPass123!',
        ])->assertRedirect('/dashboard/cliente');
    }

    public function test_staff_roles_get_separate_protected_dashboards(): void
    {
        $this->seed(RoleSeeder::class);

        $staffRoles = [
            ['ADMINISTRADOR', '/dashboard/administrador', 'Panel administrador', '/dashboard/cobrador'],
            ['COBRADOR', '/dashboard/cobrador', 'Panel de cobranzas', '/dashboard/administrador'],
        ];

        foreach ($staffRoles as [$roleName, $dashboardPath, $heading, $otherDashboardPath]) {
            $roleId = DB::table('roles')->where('nombre_rol', $roleName)->value('id_rol');
            $email = strtolower($roleName).'@example.test';

            DB::table('usuarios')->insert([
                'id_rol' => $roleId,
                'nombre' => 'Personal',
                'apellido' => $roleName,
                'correo' => $email,
                'password_hash' => Hash::make('StrongPass123!'),
                'estado' => 'ACTIVO',
            ]);

            $this->post('/login', [
                'correo' => $email,
                'password' => 'StrongPass123!',
            ])->assertRedirect($dashboardPath);

            $this->get($dashboardPath)->assertOk()->assertSee($heading);
            $this->get($otherDashboardPath)->assertForbidden();
            $this->post('/logout')->assertRedirect('/login');
        }
    }
}
