@extends('layouts.app')

@section('title', 'Dashboard - SmartVoice')
@section('header', 'Dashboard General')

@section('content')
<div class="dashboard-grid">
    <!-- Metrics Cards -->
    <div class="card" style="background: linear-gradient(135deg, #5D5FEF 0%, #4849A1 100%); color: white;">
        <div class="card-body" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h5 style="margin: 0; opacity: 0.9; font-weight: 400;">Total Campañas</h5>
                <h2 style="margin: 10px 0 0; font-size: 2.5rem; font-weight: 700;">{{ $totalCampanas }}</h2>
            </div>
            <div style="font-size: 3rem; opacity: 0.3;">
                <i class="fa-solid fa-bullhorn"></i>
            </div>
        </div>
    </div>

    <div class="card" style="background: white;">
        <div class="card-body" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h5 style="margin: 0; color: var(--text-light); font-weight: 400;">Total Audios</h5>
                <h2 style="margin: 10px 0 0; font-size: 2.5rem; font-weight: 700; color: var(--text-dark);">{{ $totalAudios }}</h2>
            </div>
            <div style="font-size: 3rem; color: var(--primary-color); opacity: 0.2;">
                <i class="fa-solid fa-microphone-lines"></i>
            </div>
        </div>
    </div>

    <div class="card" style="background: white;">
        <div class="card-body" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h5 style="margin: 0; color: var(--text-light); font-weight: 400;">Usuarios</h5>
                <h2 style="margin: 10px 0 0; font-size: 2.5rem; font-weight: 700; color: var(--text-dark);">{{ $totalUsuarios }}</h2>
            </div>
            <div style="font-size: 3rem; color: #FFD166; opacity: 0.4;">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-grid" style="grid-template-columns: 2fr 1fr; margin-top: 20px;">
    <!-- Recent Campaigns -->
    <div class="card">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title">Campañas Recientes</h3>
            <a href="{{ route('campanas.index') }}" style="color: var(--primary-color); text-decoration: none; font-size: 0.9rem; font-weight: 600;">Ver todas</a>
        </div>
        <div class="card-body">
            @if($recentCampanas->isEmpty())
                <p style="color: var(--text-light); text-align: center; padding: 20px;">No hay campañas recientes.</p>
            @else
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 1px solid #f0f0f0;">
                            <th style="padding: 10px; color: var(--text-light); font-size: 0.85rem;">Nombre</th>
                            <th style="padding: 10px; color: var(--text-light); font-size: 0.85rem;">Estado</th>
                            <th style="padding: 10px; color: var(--text-light); font-size: 0.85rem; text-align: right;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentCampanas as $campana)
                        <tr style="border-bottom: 1px solid #fbfbfb;">
                            <td style="padding: 12px 10px; font-weight: 500;">{{ $campana->nombre }}</td>
                            <td style="padding: 12px 10px;">
                                @if($campana->activa)
                                    <span style="color: #2ecc71; font-size: 0.8rem; font-weight: 600;">Activa</span>
                                @else
                                    <span style="color: #95a5a6; font-size: 0.8rem; font-weight: 600;">Inactiva</span>
                                @endif
                            </td>
                            <td style="padding: 12px 10px; text-align: right;">
                                <button class="btn-icon" style="color: var(--primary-color);"><i class="fa-solid fa-arrow-right"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Quick Actions & Recent Audios -->
    <div style="display: flex; flex-direction: column; gap: 20px;">
        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Acciones Rápidas</h3>
            </div>
            <div class="card-body" style="display: flex; flex-direction: column; gap: 10px;">
                <button class="btn btn-primary" style="width: 100%; justify-content: center; text-align: center;">
                    <i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Nueva Campaña
                </button>
                <button class="btn" style="width: 100%; justify-content: center; text-align: center; background: #eef0ff; color: var(--primary-color);">
                    <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Subir Audio
                </button>
            </div>
        </div>

        <!-- Recent Audios -->
        <div class="card" style="flex: 1;">
            <div class="card-header">
                <h3 class="card-title">Últimos Audios</h3>
            </div>
            <div class="card-body">
                @if($recentAudios->isEmpty())
                    <p style="color: var(--text-light); text-align: center; padding: 20px;">No hay audios recientes.</p>
                @else
                    <ul style="list-style: none; padding: 0; margin: 0;">
                        @foreach($recentAudios as $audio)
                        <li style="display: flex; align-items: center; gap: 10px; padding: 10px 0; border-bottom: 1px solid #fbfbfb;">
                            <div style="width: 30px; height: 30px; background: #f0f0f0; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #666;">
                                <i class="fa-solid fa-music" style="font-size: 0.8rem;"></i>
                            </div>
                            <div style="flex: 1; overflow: hidden;">
                                <div style="font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $audio->nombre }}</div>
                                <div style="font-size: 0.75rem; color: var(--text-light);">{{ $audio->campana->nombre ?? 'Sin campaña' }}</div>
                            </div>
                            <div style="font-size: 0.75rem; font-family: monospace;">{{ $audio->duracion ?? '00:00' }}</div>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
