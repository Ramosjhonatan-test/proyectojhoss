@extends('layouts.role-dashboard')

@section('title', 'Panel cobrador')
@section('role-label', 'Cobranzas')

@section('navigation')
    <a href="#resumen" aria-current="page">Resumen</a>
    <a href="#cuotas">Cuotas por cobrar</a>
    <a href="#pagos">Pagos registrados</a>
    <a href="#clientes">Clientes</a>
@endsection

@section('content')
    <div class="page-heading" id="resumen">
        <span>Cobranzas</span>
        <h1>Panel de cobranzas</h1>
        <p>Acceso a cuotas, pagos y datos de clientes relacionados con las operaciones asignadas.</p>
    </div>

    <div class="panel-grid">
        <article class="panel" id="cuotas">
            <h2>Cuotas por cobrar</h2>
            <p>Consulta fechas de vencimiento y estados pendientes, parciales o vencidos.</p>
        </article>
        <article class="panel" id="pagos">
            <h2>Registrar un pago</h2>
            <p>Los pagos se registran asociados a una cuota, un método y un comprobante.</p>
        </article>
        <article class="panel" id="clientes">
            <h2>Consulta de clientes</h2>
            <p>Busca la información de contacto y el estado crediticio del cliente.</p>
        </article>
    </div>
@endsection
