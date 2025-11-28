@extends('layouts.app')

@section('title', 'Editar Audio - SmartVoice')
@section('header', 'Editar Audio')

@push('styles')
    @vite(['resources/css/audios/edit.css'])
@endpush

@section('content')
<div class="card edit-card">
    <div class="card-body" style="padding: 30px;">
        <form action="{{ route('audios.update', $audio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <label class="form-label">Nombre del Audio</label>
                <input type="text" name="nombre" class="form-input" required value="{{ old('nombre', $audio->nombre) }}">
            </div>

            <div class="form-section">
                <label class="form-label">Campaña</label>
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
                <textarea name="descripcion" rows="3" class="form-input">{{ old('descripcion', $audio->descripcion) }}</textarea>
            </div>

            <div class="form-section">
                <label class="form-label">Archivo Actual</label>
                <div class="current-file-info">
                    <i class="fa-solid fa-file-audio file-icon"></i>
                    <div class="file-details">
                        <div class="file-name">{{ basename($audio->archivo_path) }}</div>
                        <div class="file-meta">{{ $audio->tamano }} • {{ strtoupper($audio->formato) }}</div>
                    </div>
                    <audio controls style="height: 30px;">
                        <source src="{{ asset('storage/' . $audio->archivo_path) }}" type="audio/mpeg">
                    </audio>
                </div>
            </div>

            <div class="form-section">
                <label class="form-label">Reemplazar Archivo (Opcional)</label>
                <input type="file" name="audio_file" class="form-input" accept=".mp3,.wav,.m4a,.ogg">
                <small style="color: #888; margin-top: 5px; display: block;">Deja esto vacío si no quieres cambiar el archivo de audio.</small>
            </div>

            <div class="form-actions">
                <a href="{{ route('audios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Audio</button>
            </div>
        </form>
    </div>
</div>
@endsection
