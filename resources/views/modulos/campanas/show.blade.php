@extends('layouts.app')

@section('title', $campana->nombre . ' - SmartVoice')
@section('header', 'Detalles de Campaña')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/campanas.css') }}">
@endpush

@section('content')
<div class="show-grid">
    <!-- Left Column: Audio List -->
    <div class="card">
        <div class="card-body" style="padding: 25px;">
            <div class="audio-list-header">
                <h3 class="card-title" style="margin: 0;">Audios de la Campaña</h3>
                <span class="audio-count-pill">
                    {{ $campana->audios->count() }} Audios
                </span>
            </div>

            @if($campana->audios->count() > 0)
                <ul class="recent-audio-list">
                    @foreach($campana->audios as $audio)
                    <li class="recent-audio-item">
                        <div class="audio-icon-wrapper">
                            <i class="fa-solid fa-music"></i>
                        </div>
                        <div class="audio-info">
                            <div class="audio-name">{{ $audio->nombre }}</div>
                            <div class="audio-duration">{{ $audio->duracion }}</div>
                        </div>
                        <audio controls style="height: 30px; max-width: 200px;">
                            <source src="{{ asset('storage/' . $audio->ruta_archivo) }}" type="audio/mpeg">
                            Tu navegador no soporta el elemento de audio.
                        </audio>
                    </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-audios">
                    <i class="fa-solid fa-microphone-slash empty-icon"></i>
                    <p>No hay audios asociados a esta campaña.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Right Column: Details & Upload -->
    <div style="display: flex; flex-direction: column; gap: 30px;">
        <!-- Campaign Info -->
        <div class="card">
            <div class="card-body" style="padding: 25px;">
                <h4 style="margin-top: 0; color: var(--primary-dark); margin-bottom: 15px;">Información</h4>
                
                <div class="info-section">
                    <label class="info-label">Nombre</label>
                    <div class="info-value">{{ $campana->nombre }}</div>
                </div>

                <div class="info-section">
                    <label class="info-label">Estado</label>
                    @if($campana->estado == 'activo')
                        <span class="status-active" style="font-size: 1rem;">Activo</span>
                    @else
                        <span class="status-inactive" style="font-size: 1rem;">Inactivo</span>
                    @endif
                </div>

                <div class="info-section">
                    <label class="info-label">Vigencia</label>
                    <div style="font-size: 0.95rem;">
                        {{ $campana->fecha_inicio->format('d M Y') }} - {{ $campana->fecha_fin->format('d M Y') }}
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="info-label">Descripción</label>
                    <p class="info-desc">
                        {{ $campana->descripcion ?: 'Sin descripción' }}
                    </p>
                </div>

                <a href="{{ route('campanas.index') }}" class="btn btn-secondary btn-full">
                    <i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i> Volver
                </a>
            </div>
        </div>

        <!-- Upload Form -->
        <div class="card">
            <div class="card-body" style="padding: 25px;">
                <h4 style="margin-top: 0; color: var(--primary-dark); margin-bottom: 15px;">Subir Audio</h4>
                
                <form action="{{ route('campanas.uploadAudio', $campana->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">
                        <label class="form-label">Nombre del Audio</label>
                        <input type="text" name="nombre" class="form-control" required placeholder="Ej: Spot Radio 1" style="padding: 10px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label class="form-label">Archivo de Audio</label>
                        <input type="file" name="audio" accept="audio/*" required style="width: 100%; font-size: 0.9rem;">
                        <small class="upload-helper">MP3 o WAV, máx 10MB</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Subir Audio
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
