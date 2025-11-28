@extends('layouts.app')

@section('title', $campana->nombre . ' - SmartVoice')
@section('header', 'Detalles de Campaña')

@section('content')
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
    <!-- Left Column: Audio List -->
    <div class="card">
        <div class="card-body" style="padding: 25px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <h3 class="card-title" style="margin: 0;">Audios de la Campaña</h3>
                <span style="background: #eef0ff; color: var(--primary-color); padding: 5px 12px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
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
                <div style="text-align: center; padding: 40px; color: var(--text-light); background: #f9f9f9; border-radius: 12px;">
                    <i class="fa-solid fa-microphone-slash" style="font-size: 2rem; margin-bottom: 10px; opacity: 0.3;"></i>
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
                
                <div style="margin-bottom: 15px;">
                    <label style="font-size: 0.85rem; color: var(--text-light); display: block;">Nombre</label>
                    <div style="font-weight: 600; font-size: 1.1rem;">{{ $campana->nombre }}</div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-size: 0.85rem; color: var(--text-light); display: block;">Estado</label>
                    @if($campana->estado == 'activo')
                        <span class="status-active" style="font-size: 1rem;">Activo</span>
                    @else
                        <span class="status-inactive" style="font-size: 1rem;">Inactivo</span>
                    @endif
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="font-size: 0.85rem; color: var(--text-light); display: block;">Vigencia</label>
                    <div style="font-size: 0.95rem;">
                        {{ $campana->fecha_inicio->format('d M Y') }} - {{ $campana->fecha_fin->format('d M Y') }}
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="font-size: 0.85rem; color: var(--text-light); display: block;">Descripción</label>
                    <p style="font-size: 0.95rem; line-height: 1.5; color: #555;">
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
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Nombre del Audio</label>
                        <input type="text" name="nombre" class="form-control" required placeholder="Ej: Spot Radio 1" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 5px; font-weight: 500;">Archivo de Audio</label>
                        <input type="file" name="audio" accept="audio/*" required style="width: 100%; font-size: 0.9rem;">
                        <small style="color: var(--text-light); display: block; margin-top: 5px;">MP3 o WAV, máx 10MB</small>
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
