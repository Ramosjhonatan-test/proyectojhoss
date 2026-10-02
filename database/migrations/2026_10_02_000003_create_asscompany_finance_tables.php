<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id_rol');
            $table->string('nombre_rol', 50)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamp('fecha_creacion')->useCurrent();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->unsignedInteger('id_rol');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('correo', 150)->unique();
            $table->string('password_hash', 255);
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->foreign('id_rol', 'fk_usuarios_roles')
                ->references('id_rol')->on('roles')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('ci_nit', 20)->unique();
            $table->string('nombre_completo', 200);
            $table->string('telefono', 20)->nullable();
            $table->text('direccion')->nullable();
            $table->enum('estado_crediticio', ['EXCELENTE', 'REGULAR', 'OBSERVADO', 'BLOQUEADO'])
                ->default('REGULAR');
            $table->timestamp('fecha_registro')->useCurrent();
        });

        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id_prestamo');
            $table->unsignedInteger('id_cliente');
            $table->unsignedInteger('id_usuario_registro');
            $table->decimal('monto_total', 12, 2);
            $table->decimal('tasa_interes', 5, 2)->comment('Porcentaje de interés asignado');
            $table->integer('plazo_meses');
            $table->enum('frecuencia_pago', ['DIARIO', 'SEMANAL', 'QUINCENAL', 'MENSUAL'])
                ->default('MENSUAL');
            $table->date('fecha_inicio');
            $table->enum('estado_prestamo', ['PENDIENTE', 'ACTIVO', 'CANCELADO', 'EN_MORA'])
                ->default('PENDIENTE');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->foreign('id_cliente', 'fk_prestamos_clientes')
                ->references('id_cliente')->on('clientes')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('id_usuario_registro', 'fk_prestamos_usuarios')
                ->references('id_usuario')->on('usuarios')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        Schema::create('plan_cuotas', function (Blueprint $table) {
            $table->increments('id_cuota');
            $table->unsignedInteger('id_prestamo');
            $table->integer('numero_cuota');
            $table->decimal('monto_cuota', 12, 2);
            $table->decimal('monto_capital', 12, 2);
            $table->decimal('monto_interes', 12, 2);
            $table->date('fecha_vencimiento');
            $table->enum('estado_cuota', ['PENDIENTE', 'PAGADO', 'PARCIAL', 'VENCIDO'])
                ->default('PENDIENTE');
            $table->foreign('id_prestamo', 'fk_cuotas_prestamos')
                ->references('id_prestamo')->on('prestamos')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id_pago');
            $table->unsignedInteger('id_cuota');
            $table->unsignedInteger('id_usuario_cobrador');
            $table->decimal('monto_pagado', 12, 2);
            $table->timestamp('fecha_pago')->useCurrent();
            $table->enum('metodo_pago', ['EFECTIVO', 'TRANSFERENCIA', 'QR'])->default('EFECTIVO');
            $table->string('nro_comprobante', 50)->unique();
            $table->foreign('id_cuota', 'fk_pagos_cuotas')
                ->references('id_cuota')->on('plan_cuotas')
                ->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('id_usuario_cobrador', 'fk_pagos_usuarios')
                ->references('id_usuario')->on('usuarios')
                ->restrictOnDelete()->cascadeOnUpdate();
        });

        Schema::create('garantias', function (Blueprint $table) {
            $table->increments('id_garantia');
            $table->unsignedInteger('id_prestamo');
            $table->string('tipo_garantia', 100)->comment('Inmueble, Vehículo, Garante personal, etc.');
            $table->text('descripcion');
            $table->decimal('valor_estimado', 12, 2)->nullable();
            $table->foreign('id_prestamo', 'fk_garantias_prestamos')
                ->references('id_prestamo')->on('prestamos')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('bitacora_auditoria', function (Blueprint $table) {
            $table->increments('id_auditoria');
            $table->unsignedInteger('id_usuario')->nullable();
            $table->string('accion_realizada', 100);
            $table->string('tabla_afectada', 50);
            $table->text('detalle_cambio')->nullable();
            $table->string('ip_origen', 45)->nullable();
            $table->timestamp('fecha_hora')->useCurrent();
            $table->foreign('id_usuario', 'fk_auditoria_usuarios')
                ->references('id_usuario')->on('usuarios')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bitacora_auditoria');
        Schema::dropIfExists('garantias');
        Schema::dropIfExists('pagos');
        Schema::dropIfExists('plan_cuotas');
        Schema::dropIfExists('prestamos');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('roles');
    }
};
