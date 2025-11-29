@extends('layouts.app')

@section('title', 'Mi Perfil - SmartVoice')
@section('header', 'Mi Perfil')

@push('styles')
    @vite(['resources/css/perfil/show.css'])
@endpush

@section('content')
<div class="profile-container">
    <div class="profile-grid">
        <!-- Left Column: Profile Card -->
        <div class="profile-card animate-fade-in">
            <div class="profile-avatar-wrapper">
                @if($user->profile_photo_path)
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile" class="profile-view-avatar">
                @else
                    <div class="profile-view-placeholder">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                @endif
                <div class="profile-status" title="En línea"></div>
            </div>
            
            <h2 class="profile-view-name">{{ $user->name }}</h2>
            <div class="profile-view-role">Administrador</div>

            <div class="profile-stats">
                <div class="stat-item">
                    <span class="stat-number">12</span>
                    <span class="stat-label">Campañas</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">48</span>
                    <span class="stat-label">Audios</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">2.5k</span>
                    <span class="stat-label">Vistas</span>
                </div>
            </div>

            <div class="profile-actions">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-full">
                    <i class="fa-solid fa-pen-to-square" style="margin-right: 8px;"></i> Editar Perfil
                </a>
                <button class="btn btn-secondary btn-full">
                    <i class="fa-solid fa-share-nodes" style="margin-right: 8px;"></i> Compartir
                </button>
            </div>
        </div>

        <!-- Right Column: Details & Activity -->
        <div class="profile-content-card animate-fade-in delay-100">
            <div class="profile-tabs">
                <div class="tab-link active">Información General</div>
                <div class="tab-link">Actividad Reciente</div>
                <div class="tab-link">Seguridad</div>
            </div>

            <div class="tab-content">
                <h3 class="section-title">Detalles de Contacto</h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">Nombre Completo</span>
                        <div class="info-value">
                            <i class="fa-regular fa-user" style="color: var(--primary-light);"></i>
                            {{ $user->name }}
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Correo Electrónico</span>
                        <div class="info-value">
                            <i class="fa-regular fa-envelope" style="color: var(--primary-light);"></i>
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Teléfono</span>
                        <div class="info-value">
                            <i class="fa-solid fa-phone" style="color: var(--primary-light);"></i>
                            +591 70000000
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Ubicación</span>
                        <div class="info-value">
                            <i class="fa-solid fa-location-dot" style="color: var(--primary-light);"></i>
                            Santa Cruz, Bolivia
                        </div>
                    </div>
                </div>

                <h3 class="section-title" style="margin-top: 30px;">Actividad Reciente</h3>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fa-solid fa-bullhorn"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Creó una nueva campaña "Verano 2025"</h4>
                            <span class="activity-time">Hace 2 horas</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background: rgba(46, 204, 113, 0.1); color: #2ecc71;">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Actualizó su foto de perfil</h4>
                            <span class="activity-time">Hace 1 día</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background: rgba(255, 107, 107, 0.1); color: #ff6b6b;">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Inició sesión desde nuevo dispositivo</h4>
                            <span class="activity-time">Hace 3 días</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
