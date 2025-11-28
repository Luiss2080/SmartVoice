@extends('layouts.app')

@section('title', 'Campañas - SmartVoice')
@section('header', 'Campañas')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Campañas</h3>
        <button class="btn btn-primary" style="width: auto;">Nueva Campaña</button>
    </div>
    <div class="card-body">
        <p style="color: var(--text-light);">Aquí se mostrarán las campañas activas e inactivas.</p>
        <!-- Placeholder for table -->
        <div style="margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 12px; text-align: center; color: var(--text-light);">
            No hay campañas registradas.
        </div>
    </div>
</div>
