@extends('layouts.app')

@section('title', 'Editar Audio - SmartVoice')
@section('header', 'Editar Audio')

@push('styles')
    @vite(['resources/css/audios/edit.css'])
@endpush

@section('content')
<div class="edit-container">
    <!-- Header -->
    <div class="edit-header-card">
        <h1 class="edit-title">Editar Audio</h1>
        <div class="edit-subtitle">Modifica los detalles o reemplaza el archivo de audio</div>
    </div>

    <form action="{{ route('audios.update', $audio->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="edit-grid">
            <!-- Left Column: Form Fields -->
            <div class="card">
                <div class="card-body" style="padding: 30px;">
                    <h4 style="margin-top: 0; margin-bottom: 25px; color: var(--primary-dark);">Información General</h4>
                    
                    <div class="form-section">
                        <label class="form-label">Nombre del Audio</label>
                        <input type="text" name="nombre" class="form-input" required value="{{ old('nombre', $audio->nombre) }}" placeholder="Ej: Spot Radio 1">
                    </div>

                    <div class="form-section">
                        <label class="form-label">Campaña Asociada</label>
                        <select name="campana_id" class="form-input" required>
                            @foreach($campanas as $campana)
                                <option value="{{ $campana->id }}" {{ old('campana_id', $audio->campana_id) == $campana->id ? 'selected' : '' }}>
                                    {{ $campana->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-section">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" rows="4" class="form-input" placeholder="Añade una descripción opcional...">{{ old('descripcion', $audio->descripcion) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('audios.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: File & Upload -->
            <div style="display: flex; flex-direction: column; gap: 30px;">
                <!-- Current File -->
                <div class="card">
                    <div class="card-body" style="padding: 25px;">
                        <h4 style="margin-top: 0; margin-bottom: 20px; color: var(--primary-dark);">Archivo Actual</h4>
                        
                        <div class="audio-preview-card">
                            <div class="preview-icon-wrapper">
                                <i class="fa-solid fa-music"></i>
                            </div>
                            <div class="preview-filename">{{ basename($audio->archivo_path) }}</div>
                            <div class="preview-meta">
                                <span class="meta-badge">{{ strtoupper($audio->formato) }}</span>
                                <span>{{ $audio->tamano }}</span>
                            </div>
                            <audio controls style="width: 100%; height: 36px;">
                                <source src="{{ asset('storage/' . $audio->archivo_path) }}" type="audio/mpeg">
                                Tu navegador no soporta el audio.
                            </audio>
                        </div>
                    </div>
                </div>

                <!-- Replace File -->
                <div class="card">
                    <div class="card-body" style="padding: 25px;">
                        <h4 style="margin-top: 0; margin-bottom: 20px; color: var(--primary-dark);">Reemplazar Archivo</h4>
                        
                        <div class="upload-zone">
                            <input type="file" name="audio_file" accept=".mp3,.wav,.m4a,.ogg" class="file-input-hidden" onchange="updateFileName(this)">
                            <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                            <div class="upload-text">Arrastra o selecciona</div>
                            <div class="upload-subtext" id="file-name">Deja vacío para mantener el actual</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            label.textContent = 'Deja vacío para mantener el actual';
            label.style.color = 'var(--text-light)';
            label.style.fontWeight = 'normal';
        }
    }
</script>
@endsection
