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
<div class="card edit-card">
    <div class="card-body" style="padding: 30px;">
        <form action="{{ route('campanas.update', $campana->id) }}" method="POST" id="campaignForm">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <label class="form-label">Nombre de la Campaña</label>
                <input type="text" name="nombre" class="form-control form-input" required value="{{ old('nombre', $campana->nombre) }}" placeholder="Ej: Campaña Verano 2025">
            </div>

            <div class="form-section">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control form-input" placeholder="Detalles de la campaña..." style="font-family: inherit;">{{ old('descripcion', $campana->descripcion) }}</textarea>
            </div>

            <div class="form-grid-2">
                <div>
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-input" required value="{{ old('fecha_inicio', $campana->fecha_inicio->format('Y-m-d')) }}">
                </div>
                <div>
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="form-control form-input" required value="{{ old('fecha_fin', $campana->fecha_fin->format('Y-m-d')) }}">
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-control form-input">
                    <option value="activo" {{ $campana->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $campana->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    <option value="borrador" {{ $campana->estado == 'borrador' ? 'selected' : '' }}>Borrador</option>
                </select>
            </div>

            <div class="form-actions">
                <a href="{{ route('campanas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Actualizar Campaña</button>
            </div>
        </form>
    </div>
</div>
@endsection
