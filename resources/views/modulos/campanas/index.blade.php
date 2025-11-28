@extends('layouts.app')

@section('title', 'Campañas - SmartVoice')
@section('header', 'Campañas')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Listado de Campañas</h3>
        <button class="btn btn-primary" style="width: auto;">
            <i class="fa-solid fa-plus"></i> Nueva Campaña
        </button>
    </div>
    <div class="card-body">
        @if($campanas->isEmpty())
            <div style="padding: 40px; text-align: center; color: var(--text-light);">
                <i class="fa-solid fa-bullhorn" style="font-size: 3rem; margin-bottom: 20px; opacity: 0.5;"></i>
                <p>No hay campañas registradas aún.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">ID</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Nombre</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Categoría</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Estado</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600; text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campanas as $campana)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 15px;">#{{ $campana->id }}</td>
                            <td style="padding: 15px; font-weight: 500;">{{ $campana->nombre }}</td>
                            <td style="padding: 15px;">
                                <span style="background: #eef0ff; color: var(--primary-color); padding: 5px 10px; border-radius: 20px; font-size: 0.85rem;">
                                    {{ $campana->categoria ?? 'General' }}
                                </span>
                            </td>
                            <td style="padding: 15px;">
                                @if($campana->activa)
                                    <span style="color: #2ecc71; font-weight: 600; font-size: 0.9rem;">● Activa</span>
                                @else
                                    <span style="color: #95a5a6; font-weight: 600; font-size: 0.9rem;">● Inactiva</span>
                                @endif
                            </td>
                            <td style="padding: 15px; text-align: right;">
                                <button style="background: none; border: none; color: var(--primary-color); cursor: pointer; margin-right: 10px;">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button style="background: none; border: none; color: var(--accent-color); cursor: pointer;">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
