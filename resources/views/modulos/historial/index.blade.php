@extends('layouts.app')

@section('title', 'Historial - SmartVoice')
@section('header', 'Historial de Reproducciones')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro de Actividad</h3>
    </div>
    <div class="card-body">
        <p style="color: var(--text-light);">Consulta el historial de llamadas y reproducciones.</p>
        <!-- Placeholder for table -->
        <div style="margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 12px; text-align: center; color: var(--text-light);">
            No hay actividad reciente.
        </div>
    </div>
</div>
