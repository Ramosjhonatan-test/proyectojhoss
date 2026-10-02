<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'correo.required' => 'Ingresa tu correo electrónico.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'password.required' => 'Ingresa tu contraseña.',
        ]);

        if (! Auth::attempt([
            'correo' => $credentials['correo'],
            'password' => $credentials['password'],
            'estado' => 'ACTIVO',
        ])) {
            return back()
                ->withErrors(['correo' => 'El correo o la contraseña no son correctos.'])
                ->onlyInput('correo');
        }

        $request->session()->regenerate();

        return redirect($this->dashboardPath(Auth::user()));
    }

    public function showRegistration(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email', 'max:150', 'unique:usuarios,correo'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nombre.required' => 'Ingresa tu nombre.',
            'apellido.required' => 'Ingresa tu apellido.',
            'correo.required' => 'Ingresa tu correo electrónico.',
            'correo.email' => 'Ingresa un correo electrónico válido.',
            'correo.unique' => 'Ya existe una cuenta con este correo.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $clientRole = Role::query()->where('nombre_rol', 'CLIENTE')->firstOrFail();

        $user = User::create([
            'id_rol' => $clientRole->id_rol,
            'nombre' => $attributes['nombre'],
            'apellido' => $attributes['apellido'],
            'correo' => $attributes['correo'],
            'password_hash' => Hash::make($attributes['password']),
            'estado' => 'ACTIVO',
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard.client');
    }

    public function dashboard(): RedirectResponse
    {
        return redirect($this->dashboardPath(Auth::user()));
    }

    public function administratorDashboard(): View
    {
        return view('dashboard.admin');
    }

    public function collectorDashboard(): View
    {
        return view('dashboard.collector');
    }

    public function clientDashboard(): View
    {
        return view('dashboard.client');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function dashboardPath(?User $user): string
    {
        return match ($user?->role?->nombre_rol) {
            'ADMINISTRADOR' => route('dashboard.admin'),
            'COBRADOR' => route('dashboard.collector'),
            'CLIENTE' => route('dashboard.client'),
            default => abort(403),
        };
    }
}
