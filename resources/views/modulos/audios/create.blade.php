@extends('layouts.app')

@section('title', 'Subir Audio - SmartVoice')
@section('header', 'Subir Nuevo Audio')

@push('styles')
    @vite(['resources/css/audios/create.css'])
@endpush

@section('content')
<div class="create-container">
    <!-- Header -->
    <div class="create-header-card">
        <h1 class="create-title">Subir Nuevo Audio</h1>
        <div class="create-subtitle">Sube un archivo de audio y asígnalo a una campaña</div>
    </div>

    <form action="{{ route('audios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="create-grid">
            <!-- Left Column: Form Fields -->
            <div class="card">
                <div class="card-body" style="padding: 30px;">
                    <h4 style="margin-top: 0; margin-bottom: 25px; color: var(--primary-dark);">Información del Audio</h4>
                    
                    <div class="form-section">
                        <label class="form-label">Nombre del Audio</label>
                        <input type="text" name="nombre" class="form-input" required placeholder="Ej: Spot Radio Verano" value="{{ old('nombre') }}">
                    </div>

                    <div class="form-section">
                        <label class="form-label">Campaña Asociada</label>
                        <select name="campana_id" class="form-input" required>
                            <option value="">Seleccionar Campaña...</option>
                            @foreach($campanas as $campana)
                                <option value="{{ $campana->id }}" {{ old('campana_id') == $campana->id ? 'selected' : '' }}>
                                    {{ $campana->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-section">
                        <label class="form-label">Descripción (Opcional)</label>
                        <textarea name="descripcion" rows="4" class="form-input" placeholder="Detalles sobre el audio...">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('audios.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Subir Audio
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Upload Zone -->
            <div class="card">
                <div class="card-body" style="padding: 25px; height: 100%;">
                    <div class="upload-zone">
                        <input type="file" name="audio_file" id="audio_file" accept=".mp3,.wav,.m4a,.ogg" class="file-input-hidden" required onchange="updateFileName(this)">
                        <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                        <div class="upload-text">Arrastra o selecciona</div>
                        <div class="upload-subtext" id="file-name">Soporta MP3, WAV, M4A (Máx 20MB)</div>
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
            label.textContent = 'Soporta MP3, WAV, M4A (Máx 20MB)';
            label.style.color = 'var(--text-light)';
            label.style.fontWeight = 'normal';
        }
    }
</script>
@endsection
