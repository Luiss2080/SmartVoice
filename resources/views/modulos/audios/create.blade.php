@extends('layouts.app')

@section('title', 'Subir Audio - SmartVoice')
@section('header', 'Subir Nuevo Audio')

@push('styles')
    @vite(['resources/css/audios/create.css'])
@endpush

@section('content')
<div class="card create-card">
    <div class="card-body" style="padding: 30px;">
        <form action="{{ route('audios.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-section">
                <label class="form-label">Nombre del Audio</label>
                <input type="text" name="nombre" class="form-input" required placeholder="Ej: Spot Radio Verano" value="{{ old('nombre') }}">
            </div>

            <div class="form-section">
                <label class="form-label">Campaña</label>
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
                <textarea name="descripcion" rows="3" class="form-input" placeholder="Detalles sobre el audio...">{{ old('descripcion') }}</textarea>
            </div>

            <div class="form-section">
                <label class="form-label">Archivo de Audio</label>
                <div class="file-upload-area" onclick="document.getElementById('audio_file').click()">
                    <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                    <div class="upload-text">Haz clic para seleccionar o arrastra el archivo aquí</div>
                    <div class="upload-hint">Soporta MP3, WAV, M4A (Máx 20MB)</div>
                    <input type="file" name="audio_file" id="audio_file" accept=".mp3,.wav,.m4a,.ogg" style="display: none;" required onchange="updateFileName(this)">
                    <div id="file-name" style="margin-top: 15px; font-weight: 600; color: var(--primary-color);"></div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('audios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Subir Audio</button>
            </div>
        </form>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileNameDiv = document.getElementById('file-name');
        if (input.files && input.files.length > 0) {
            fileNameDiv.textContent = 'Archivo seleccionado: ' + input.files[0].name;
        } else {
            fileNameDiv.textContent = '';
        }
    }
</script>
@endsection
