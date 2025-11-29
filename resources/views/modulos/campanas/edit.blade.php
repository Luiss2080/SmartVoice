@extends('layouts.app')

@section('title', 'Editar Campaña - SmartVoice')
@section('header', 'Editar Campaña')

@push('styles')
    @vite(['resources/css/campanas/edit.css'])
@endpush

@push('scripts')
    @vite(['resources/js/campanas/form.js'])
@endpush

@section('content')
@section('content')
<div class="edit-container">
    <!-- Header -->
    <div class="edit-header-card">
        <h1 class="edit-title">Editar Campaña</h1>
        <div class="edit-subtitle">Modifica los detalles y configuración de la campaña</div>
    </div>

    <form action="{{ route('campanas.update', $campana->id) }}" method="POST" id="campaignForm">
        @csrf
        @method('PUT')
        
        <div class="edit-grid">
            <!-- Left Column: Main Info -->
            <div class="card">
                <div class="card-body" style="padding: 30px;">
                    <h4 style="margin-top: 0; margin-bottom: 25px; color: var(--primary-dark);">Información General</h4>
                    
                    <div class="form-section">
                        <label class="form-label">Nombre de la Campaña</label>
                        <input type="text" name="nombre" class="form-input" required value="{{ old('nombre', $campana->nombre) }}" placeholder="Ej: Campaña Verano 2025">
                    </div>

                    <div class="form-section">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" rows="6" class="form-input" placeholder="Detalles de la campaña...">{{ old('descripcion', $campana->descripcion) }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('campanas.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
                        </button>
                    </div>
                </div>
            </div>

            <!-- Right Column: Settings -->
            <div style="display: flex; flex-direction: column; gap: 30px;">
                <div class="card">
                    <div class="card-body" style="padding: 25px;">
                        <h4 style="margin-top: 0; margin-bottom: 20px; color: var(--primary-dark);">Configuración</h4>
                        
                        <div class="form-section">
                            <label class="form-label">Estado</label>
                            <select name="estado" class="form-input">
                                <option value="activo" {{ $campana->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ $campana->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                <option value="borrador" {{ $campana->estado == 'borrador' ? 'selected' : '' }}>Borrador</option>
                            </select>
                        </div>

                        <div class="form-section">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-input" required value="{{ old('fecha_inicio', $campana->fecha_inicio?->format('Y-m-d')) }}">
                        </div>

                        <div class="form-section">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-input" required value="{{ old('fecha_fin', $campana->fecha_fin?->format('Y-m-d')) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
