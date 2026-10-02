@extends('layouts.role-dashboard')

@section('title', 'Panel administrador')
@section('role-label', 'Administración')

@section('navigation')
    <a href="#resumen" aria-current="page">Resumen</a>
    <a href="#usuarios">Usuarios y roles</a>
    <a href="#cartera">Cartera de préstamos</a>
    <a href="#auditoria">Auditoría</a>
@endsection

@section('content')
    <div class="page-heading" id="resumen">
        <span>Administración</span>
        <h1>Panel administrador</h1>
        <p>Vista general de usuarios, clientes, préstamos y actividad de auditoría de ASSCOMPANY S.R.L.</p>
    </div>

    <div class="panel-grid">
        <article class="panel" id="usuarios">
            <h2>Usuarios y roles</h2>
            <p>Administra cuentas y asigna permisos de administrador, cobrador o cliente.</p>
        </article>
        <article class="panel" id="cartera">
            <h2>Clientes y préstamos</h2>
            <p>Consulta expedientes, operaciones, cuotas y garantías registradas.</p>
        </article>
        <article class="panel" id="auditoria">
            <h2>Bitácora de auditoría</h2>
            <p>Revisa acciones realizadas, usuario responsable y tabla afectada.</p>
        </article>
    </div>
@endsection
