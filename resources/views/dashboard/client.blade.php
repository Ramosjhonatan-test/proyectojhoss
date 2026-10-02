@extends('layouts.role-dashboard')

@section('title', 'Panel del cliente')
@section('role-label', 'Área personal')

@section('navigation')
    <a href="#resumen" aria-current="page">Resumen</a>
    <a href="#prestamos">Mis préstamos</a>
    <a href="#cuotas">Plan de cuotas</a>
    <a href="#pagos">Historial de pagos</a>
@endsection

@section('content')
    <div class="page-heading" id="resumen">
        <span>Área personal</span>
        <h1>Panel del cliente</h1>
        <p>Consulta tus préstamos, fechas de pago y comprobantes desde tu espacio personal.</p>
    </div>

    <section class="empty-state" id="prestamos">
        <h2>Tu expediente aún no está vinculado</h2>
        <p>Por seguridad, un administrador debe asociar tu cuenta con tu registro de cliente antes de mostrar préstamos y datos financieros. Cuando se realice esa asociación, aquí aparecerán tu plan de cuotas y el historial de pagos.</p>
    </section>

    <div class="panel-grid" style="margin-top: 18px;">
        <article class="panel" id="cuotas">
            <h2>Plan de cuotas</h2>
            <p>Consulta vencimientos y el estado de cada cuota vinculada a tu expediente.</p>
        </article>
        <article class="panel" id="pagos">
            <h2>Historial de pagos</h2>
            <p>Revisa pagos registrados y sus números de comprobante.</p>
        </article>
    </div>
@endsection
