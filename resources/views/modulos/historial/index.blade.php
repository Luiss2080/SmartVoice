@extends('layouts.app')

@section('title', 'Historial - SmartVoice')
@section('header', 'Historial de Reproducciones')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro de Actividad</h3>
        <button class="btn btn-primary" style="width: auto;">
            <i class="fa-solid fa-file-export"></i> Exportar
        </button>
    </div>
    <div class="card-body">
        @if($historial->isEmpty())
            <div style="padding: 40px; text-align: center; color: var(--text-light);">
                <i class="fa-solid fa-clock-rotate-left" style="font-size: 3rem; margin-bottom: 20px; opacity: 0.5;"></i>
                <p>No hay actividad reciente.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">ID</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Campaña</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Audio</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Fecha</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($historial as $registro)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 15px;">#{{ $registro->id }}</td>
                            <td style="padding: 15px;">{{ $registro->campana->nombre ?? 'N/A' }}</td>
                            <td style="padding: 15px;">{{ $registro->audio->nombre ?? 'N/A' }}</td>
                            <td style="padding: 15px;">{{ $registro->created_at->format('d/m/Y H:i') }}</td>
                            <td style="padding: 15px;">
                                <span style="background: #eef0ff; color: var(--primary-color); padding: 5px 10px; border-radius: 20px; font-size: 0.85rem;">
                                    Completado
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
