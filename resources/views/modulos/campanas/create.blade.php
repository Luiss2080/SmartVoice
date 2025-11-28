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
<div class="card create-card">
    <div class="card-body" style="padding: 30px;">
        <form action="{{ route('campanas.store') }}" method="POST" id="campaignForm">
            @csrf
            
            <div class="form-section">
                <label class="form-label">Nombre de la Campaña</label>
                <input type="text" name="nombre" class="form-control form-input" required placeholder="Ej: Campaña Verano 2025">
            </div>

            <div class="form-section">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control form-input" placeholder="Detalles de la campaña..." style="font-family: inherit;"></textarea>
            </div>

            <div class="form-grid-2">
                <div>
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-input" required>
                </div>
                <div>
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control form-input" required>
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="form-label">Estado Inicial</label>
                <select name="estado" class="form-control form-input">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="borrador">Borrador</option>
                </select>
            </div>

            <div class="form-actions">
                <a href="{{ route('campanas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Campaña</button>
            </div>
        </form>
    </div>
</div>
@endsection
