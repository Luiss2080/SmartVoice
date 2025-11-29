@extends('layouts.app')

@section('title', $campana->nombre . ' - SmartVoice')
@section('header', 'Detalles de Campaña')

@push('styles')
    @vite(['resources/css/campanas/show.css'])
@endpush

@section('content')
<!-- Campaign Header -->
<div class="campaign-header-card">
    <div class="campaign-header-content">
        <h1 class="campaign-title">{{ $campana->nombre }}</h1>
        <div class="campaign-meta">
            <div class="campaign-meta-item">
                @if($campana->estado == 'activo')
                    <span class="campaign-status-badge status-active">Activo</span>
                @else
                    <span class="campaign-status-badge status-inactive">Inactivo</span>
                @endif
            </div>
            <div class="campaign-meta-item">
                <i class="fa-regular fa-calendar"></i>
                <span>{{ $campana->fecha_inicio ? $campana->fecha_inicio->format('d M Y') : 'N/A' }} - {{ $campana->fecha_fin ? $campana->fecha_fin->format('d M Y') : 'N/A' }}</span>
            </div>
        </div>
    </div>
</div>

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
                            <div class="audio-duration">{{ $audio->duracion ?: '--:--' }}</div>
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
                    <p style="font-size: 0.9rem; margin-top: 10px;">Sube tu primer audio usando el panel de la derecha.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Right Column: Details & Upload -->
    <div style="display: flex; flex-direction: column; gap: 30px;">
        <!-- Upload Form -->
        <div class="card">
            <div class="card-body" style="padding: 25px;">
                <h4 style="margin-top: 0; color: var(--primary-dark); margin-bottom: 20px;">Subir Nuevo Audio</h4>
                
                <form action="{{ route('campanas.uploadAudio', $campana->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 20px;">
                        <label class="form-label">Nombre del Audio</label>
                        <input type="text" name="nombre" class="form-control" required placeholder="Ej: Spot Radio 1" style="padding: 12px; border-radius: 10px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <div class="upload-zone">
                            <input type="file" name="audio" accept="audio/*" required class="file-input-hidden" onchange="updateFileName(this)">
                            <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                            <div class="upload-text">Arrastra o selecciona un archivo</div>
                            <div class="upload-subtext" id="file-name">MP3 o WAV, máx 10MB</div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full">
                        Subir Audio
                    </button>
                </form>
            </div>
        </div>

        <!-- Campaign Info -->
        <div class="card">
            <div class="card-body" style="padding: 25px;">
                <h4 style="margin-top: 0; color: var(--primary-dark); margin-bottom: 20px;">Detalles</h4>
                
                <div class="info-card-item">
                    <label class="info-label">Descripción</label>
                    <div class="info-value" style="font-size: 0.95rem; line-height: 1.5;">
                        {{ $campana->descripcion ?: 'Sin descripción disponible.' }}
                    </div>
                </div>

                <a href="{{ route('campanas.index') }}" class="btn btn-secondary btn-full">
                    <i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i> Volver al Listado
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0]?.name;
        const label = document.getElementById('file-name');
        if (fileName) {
            label.textContent = fileName;
            label.style.color = 'var(--primary-color)';
            label.style.fontWeight = '600';
        } else {
            label.textContent = 'MP3 o WAV, máx 10MB';
            label.style.color = 'var(--text-light)';
            label.style.fontWeight = 'normal';
        }
    }
</script>
@endsection
