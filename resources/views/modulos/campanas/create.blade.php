@extends('layouts.app')

@section('title', 'Nueva Campaña - SmartVoice')
@section('header', 'Crear Nueva Campaña')

@push('styles')
    @vite(['resources/css/campanas/create.css'])
@endpush

@push('scripts')
    @vite(['resources/js/campanas/form.js'])
@endpush

@section('content')
@section('content')
<div class="create-container">
    <!-- Header -->
    <div class="create-header-card">
        <h1 class="create-title">Crear Nueva Campaña</h1>
        <div class="create-subtitle">Configura los detalles de tu nueva campaña publicitaria</div>
    </div>

    <form action="{{ route('campanas.store') }}" method="POST" id="campaignForm">
        @csrf
        
        <div class="create-grid">
            <!-- Left Column: Main Info -->
            <div class="card">
                <div class="card-body" style="padding: 30px;">
                    <h4 style="margin-top: 0; margin-bottom: 25px; color: var(--primary-dark);">Información General</h4>
                    
                    <div class="form-section">
                        <label class="form-label">Nombre de la Campaña</label>
                        <input type="text" name="nombre" class="form-input" required placeholder="Ej: Campaña Verano 2025" value="{{ old('nombre') }}">
                    </div>

                    <div class="form-section">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" rows="6" class="form-input" placeholder="Detalles de la campaña...">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('campanas.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Crear Campaña
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
                            <label class="form-label">Estado Inicial</label>
                            <select name="estado" class="form-input">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                                <option value="borrador">Borrador</option>
                            </select>
                        </div>

                        <div class="form-section">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-input" required value="{{ old('fecha_inicio') }}">
                        </div>

                        <div class="form-section">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-input" required value="{{ old('fecha_fin') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
