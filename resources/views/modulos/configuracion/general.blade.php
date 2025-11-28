@extends('modulos.configuracion.layout')

@section('config-content')
    <h2 class="config-page-title">Ajustes Generales</h2>
    <p class="config-page-subtitle">Información básica del negocio y contacto.</p>

    <form action="{{ route('configuracion.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="config-grid">
            <div class="config-item">
                <label class="config-label">Nombre del Negocio</label>
                <p class="config-desc">Este nombre se mostrará en la interfaz principal.</p>
                <input type="text" name="nombre_negocio" class="config-input" value="{{ $configuraciones['nombre_negocio'] ?? 'SmartVoice' }}">
            </div>

            <div class="config-item">
                <label class="config-label">Correo de Contacto</label>
                <p class="config-desc">Email para recibir notificaciones del sistema.</p>
                <input type="email" name="email_contacto" class="config-input" value="{{ $configuraciones['email_contacto'] ?? '' }}">
            </div>

            <div class="config-item">
                <label class="config-label">Dirección</label>
                <p class="config-desc">Ubicación física del negocio (opcional).</p>
                <input type="text" name="direccion" class="config-input" value="{{ $configuraciones['direccion'] ?? '' }}">
            </div>

            <div class="config-item">
                <label class="config-label">Teléfono</label>
                <p class="config-desc">Número de contacto principal.</p>
                <input type="text" name="telefono" class="config-input" value="{{ $configuraciones['telefono'] ?? '' }}">
            </div>
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
            </button>
        </div>
    </form>
@endsection
