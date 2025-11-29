@extends('layouts.app')

@section('title', 'Configuración - SmartVoice')
@section('header', 'Configuración del Sistema')

@push('styles')
    @vite(['resources/css/modulos/configuracion/general.css', 'resources/css/modulos/configuracion/usuarios.css'])
@endpush

@section('content')
<div class="card config-card">
    <div class="card-body" style="padding: 40px;">
        <div class="config-header">
            <h2 class="config-title">Ajustes Generales</h2>
            <p class="config-subtitle">Personaliza el comportamiento de SmartVoice según tus necesidades.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('configuracion.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- General Settings -->
            <div class="config-section">
                <div class="section-title">
                    <div class="section-icon"><i class="fa-solid fa-sliders"></i></div>
                    General
                </div>
                <div class="config-grid">
                    <div class="config-item">
                        <label class="config-label">Nombre del Negocio</label>
                        <p class="config-desc">Nombre que aparecerá en los reportes y encabezados.</p>
                        <input type="text" name="nombre_negocio" class="config-input" value="{{ $configuraciones['nombre_negocio'] ?? 'Mi Negocio' }}">
                    </div>
                    <div class="config-item">
                        <label class="config-label">Correo de Contacto</label>
                        <p class="config-desc">Email para notificaciones del sistema.</p>
                        <input type="email" name="email_contacto" class="config-input" value="{{ $configuraciones['email_contacto'] ?? '' }}">
                    </div>
                </div>
            </div>

            <!-- Playback Settings -->
            <div class="config-section">
                <div class="section-title">
                    <div class="section-icon"><i class="fa-solid fa-music"></i></div>
                    Reproducción
                </div>
                <div class="config-grid">
                    <div class="config-item switch-wrapper">
                        <div>
                            <label class="config-label">Autoplay</label>
                            <p class="config-desc" style="margin-bottom: 0;">Iniciar reproducción al seleccionar campaña.</p>
                        </div>
                        <label class="switch">
                            <input type="hidden" name="autoplay" value="0">
                            <input type="checkbox" name="autoplay" value="1" {{ ($configuraciones['autoplay'] ?? '0') == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="config-item switch-wrapper">
                        <div>
                            <label class="config-label">Loop Infinito</label>
                            <p class="config-desc" style="margin-bottom: 0;">Repetir la lista de reproducción automáticamente.</p>
                        </div>
                        <label class="switch">
                            <input type="hidden" name="loop" value="0">
                            <input type="checkbox" name="loop" value="1" {{ ($configuraciones['loop'] ?? '0') == '1' ? 'checked' : '' }}>
                            <span class="slider"></span>
                        </label>
                    </div>
                    <div class="config-item">
                        <label class="config-label">Volumen por Defecto</label>
                        <p class="config-desc">Nivel de volumen inicial (0-100).</p>
                        <input type="number" name="volumen_default" class="config-input" min="0" max="100" value="{{ $configuraciones['volumen_default'] ?? '80' }}">
                    </div>
                    <div class="config-item">
                        <label class="config-label">Crossfade (segundos)</label>
                        <p class="config-desc">Tiempo de transición entre audios.</p>
                        <input type="number" name="crossfade" class="config-input" min="0" max="10" value="{{ $configuraciones['crossfade'] ?? '2' }}">
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary" style="min-width: 200px;">
                    <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
