@extends('layouts.app')

@section('title', 'Campañas - SmartVoice')
@section('header', 'Gestión de Campañas')

@section('content')
<div class="card">
    <div class="card-body" style="padding: 20px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 class="card-title">Listado de Campañas</h3>
            <a href="{{ route('campanas.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Nueva Campaña
            </a>
        </div>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #f0f0f0;">
                        <th class="table-header-cell" style="text-align: left;">Nombre</th>
                        <th class="table-header-cell" style="text-align: left;">Descripción</th>
                        <th class="table-header-cell" style="text-align: center;">Audios</th>
                        <th class="table-header-cell" style="text-align: center;">Estado</th>
                        <th class="table-header-cell" style="text-align: center;">Fechas</th>
                        <th class="table-header-cell" style="text-align: right;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($campanas as $campana)
                    <tr style="border-bottom: 1px solid #f9f9f9;">
                        <td class="table-cell">
                            <div style="font-weight: 600;">{{ $campana->nombre }}</div>
                        </td>
                        <td class="table-cell" style="color: var(--text-light); font-size: 0.9rem;">
                            {{ Str::limit($campana->descripcion, 50) }}
                        </td>
                        <td class="table-cell" style="text-align: center;">
                            <span style="background: #eef0ff; color: var(--primary-color); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">
                                {{ $campana->audios_count }}
                            </span>
                        </td>
                        <td class="table-cell" style="text-align: center;">
                            @if($campana->estado == 'activo')
                                <span class="status-active">Activo</span>
                            @else
                                <span class="status-inactive">Inactivo</span>
                            @endif
                        </td>
                        <td class="table-cell" style="text-align: center; font-size: 0.85rem; color: var(--text-light);">
                            {{ $campana->fecha_inicio->format('d/m/Y') }} - {{ $campana->fecha_fin->format('d/m/Y') }}
                        </td>
                        <td class="table-cell" style="text-align: right;">
                            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                                <a href="{{ route('campanas.show', $campana->id) }}" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.9rem;" title="Ver Detalles">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <form action="{{ route('campanas.destroy', $campana->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta campaña?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon" style="width: 32px; height: 32px; font-size: 0.9rem; color: #ff6b6b;" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-light);">
                            <i class="fa-solid fa-bullhorn" style="font-size: 2rem; margin-bottom: 10px; opacity: 0.3;"></i>
                            <p>No hay campañas registradas.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
