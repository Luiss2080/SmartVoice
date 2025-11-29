@extends('layouts.app')

@section('title', 'Campañas - SmartVoice')
@section('header', 'Gestión de Campañas')

@push('styles')
    @vite(['resources/css/campanas/index.css'])
@endpush

@push('scripts')
    @vite(['resources/js/campanas/index.js'])
@endpush

@section('content')
<div class="card">
    <div class="card-body" style="padding: 20px;">
        <div class="campaign-card-header">
            <h3 class="card-title">Listado de Campañas</h3>
            <a href="{{ route('campanas.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="margin-right: 8px;"></i> Nueva Campaña
            </a>
        </div>

        @if(session('success'))
            <div class="campaign-success-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="campaign-table-container">
            <table class="campaign-table">
                <thead>
                    <tr>
                        <th class="table-header-cell">Nombre</th>
                        <th class="table-header-cell">Descripción</th>
                        <th class="table-header-cell center">Audios</th>
                        <th class="table-header-cell center">Estado</th>
                        <th class="table-header-cell center">Fechas</th>
                        <th class="table-header-cell right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($campanas as $campana)
                    <tr>
                        <td class="table-cell">
                            <div class="campaign-name">{{ $campana->nombre }}</div>
                        </td>
                        <td class="table-cell">
                            <div class="campaign-desc">{{ Str::limit($campana->descripcion, 50) }}</div>
                        </td>
                        <td class="table-cell" style="text-align: center;">
                            <span class="audio-count-badge">
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
                        <td class="table-cell">
                            <div class="campaign-dates">
                                @if($campana->fecha_inicio && $campana->fecha_fin)
                                    {{ $campana->fecha_inicio->format('d/m/Y') }} - {{ $campana->fecha_fin->format('d/m/Y') }}
                                @else
                                    <span class="text-muted">Sin fechas</span>
                                @endif
                            </div>
                        </td>
                        <td class="table-cell">
                            <div class="campaign-actions">
                                <a href="{{ route('campanas.show', $campana->id) }}" class="btn-icon btn-action-view" title="Ver Detalles">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('campanas.edit', $campana->id) }}" class="btn-icon btn-action-view" title="Editar" style="color: var(--primary-color);">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('campanas.destroy', $campana->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-icon btn-action-delete" title="Eliminar" onclick="confirmDelete(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fa-solid fa-bullhorn empty-icon"></i>
                                <p>No hay campañas registradas.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(btn) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                btn.closest('form').submit();
            }
        })
    }
</script>
@endsection
