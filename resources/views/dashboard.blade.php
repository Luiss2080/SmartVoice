@extends('layouts.app')

@section('title', 'Dashboard - SmartVoice')
@section('header', 'Dashboard General')

@section('content')
<div class="dashboard-grid">
    <!-- Metrics Cards -->
    <div class="card card-metrics-primary">
        <div class="card-body metrics-content">
            <div>
                <h5 class="metrics-title">Total Campañas</h5>
                <h2 class="metrics-value">{{ $totalCampanas }}</h2>
            </div>
            <div class="metrics-icon-primary">
                <i class="fa-solid fa-bullhorn"></i>
            </div>
        </div>
    </div>

    <div class="card card-metrics-white">
        <div class="card-body metrics-content">
            <div>
                <h5 class="metrics-title-dark">Total Audios</h5>
                <h2 class="metrics-value-dark">{{ $totalAudios }}</h2>
            </div>
            <div class="metrics-icon-secondary">
                <i class="fa-solid fa-microphone-lines"></i>
            </div>
        </div>
    </div>

    <div class="card card-metrics-white">
        <div class="card-body metrics-content">
            <div>
                <h5 class="metrics-title-dark">Usuarios</h5>
                <h2 class="metrics-value-dark">{{ $totalUsuarios }}</h2>
            </div>
            <div class="metrics-icon-tertiary">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>
</div>

<div class="dashboard-split">
    <!-- Recent Campaigns -->
    <div class="card">
        <div class="card-header card-header-flex">
            <h3 class="card-title">Campañas Recientes</h3>
            <a href="{{ route('campanas.index') }}" class="link-primary">Ver todas</a>
        </div>
        <div class="card-body">
            @if($recentCampanas->isEmpty())
                <p style="color: var(--text-light); text-align: center; padding: 20px;">No hay campañas recientes.</p>
            @else
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 1px solid #f0f0f0;">
                            <th class="table-header-cell">Nombre</th>
                            <th class="table-header-cell">Estado</th>
                            <th class="table-header-cell" style="text-align: right;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentCampanas as $campana)
                        <tr style="border-bottom: 1px solid #fbfbfb;">
                            <td class="table-cell" style="font-weight: 500;">{{ $campana->nombre }}</td>
                            <td class="table-cell">
                                @if($campana->activa)
                                    <span class="status-active">Activa</span>
                                @else
                                    <span class="status-inactive">Inactiva</span>
                                @endif
                            </td>
                            <td class="table-cell" style="text-align: right;">
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
            <div class="card-body quick-actions-body">
                <button class="btn btn-primary btn-full">
                    <i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Nueva Campaña
                </button>
                <button class="btn btn-secondary btn-full">
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
                    <ul class="recent-audio-list">
                        @foreach($recentAudios as $audio)
                        <li class="recent-audio-item">
                            <div class="audio-icon-wrapper">
                                <i class="fa-solid fa-music" style="font-size: 0.8rem;"></i>
                            </div>
                            <div class="audio-info">
                                <div class="audio-name">{{ $audio->nombre }}</div>
                                <div class="audio-campaign">{{ $audio->campana->nombre ?? 'Sin campaña' }}</div>
                            </div>
                            <div class="audio-duration">{{ $audio->duracion ?? '00:00' }}</div>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
