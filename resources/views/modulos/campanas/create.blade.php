@extends('layouts.app')

@section('title', 'Nueva Campaña - SmartVoice')
@section('header', 'Crear Nueva Campaña')

@section('content')
<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div class="card-body" style="padding: 30px;">
        <form action="{{ route('campanas.store') }}" method="POST">
            @csrf
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Nombre de la Campaña</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Ej: Campaña Verano 2025" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Descripción</label>
                <textarea name="descripcion" rows="4" class="form-control" placeholder="Detalles de la campaña..." style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Fecha Fin</label>
                    <input type="date" name="fecha_fin" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Estado Inicial</label>
                <select name="estado" class="form-control" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                    <option value="borrador">Borrador</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 15px;">
                <a href="{{ route('campanas.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar Campaña</button>
            </div>
        </form>
    </div>
</div>
@endsection
