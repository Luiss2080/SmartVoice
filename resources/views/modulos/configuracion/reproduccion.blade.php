@extends('modulos.configuracion.layout')

@section('config-content')
    <h2 class="config-page-title">Configuración de Reproducción</h2>
    <p class="config-page-subtitle">Controla cómo se comportan los audios y campañas.</p>

    <form action="{{ route('configuracion.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="config-grid">
            <div class="config-item switch-wrapper">
                <div>
                    <label class="config-label">Autoplay</label>
                    <p class="config-desc" style="margin-bottom: 0;">Iniciar reproducción automáticamente al entrar a una campaña.</p>
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
                    <p class="config-desc" style="margin-bottom: 0;">Repetir la lista de reproducción al finalizar.</p>
                </div>
                <label class="switch">
                    <input type="hidden" name="loop" value="0">
                    <input type="checkbox" name="loop" value="1" {{ ($configuraciones['loop'] ?? '0') == '1' ? 'checked' : '' }}>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="config-item">
                <label class="config-label">Volumen Inicial (%)</label>
                <p class="config-desc">Nivel de volumen por defecto (0-100).</p>
                <input type="number" name="volumen_default" class="config-input" min="0" max="100" value="{{ $configuraciones['volumen_default'] ?? '80' }}">
            </div>

            <div class="config-item">
                <label class="config-label">Crossfade (segundos)</label>
                <p class="config-desc">Tiempo de transición suave entre audios.</p>
                <input type="number" name="crossfade" class="config-input" min="0" max="10" value="{{ $configuraciones['crossfade'] ?? '2' }}">
            </div>
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
            </button>
        </div>
    </form>
@endsection
