@extends('layouts.app')

@section('title', 'Usuarios - SmartVoice')
@section('header', 'Gestión de Usuarios')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuarios del Sistema</h3>
        <button class="btn btn-primary" style="width: auto;">
            <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
        </button>
    </div>
    <div class="card-body">
        @if($usuarios->isEmpty())
            <div style="padding: 40px; text-align: center; color: var(--text-light);">
                <i class="fa-solid fa-users" style="font-size: 3rem; margin-bottom: 20px; opacity: 0.5;"></i>
                <p>No hay usuarios registrados.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Usuario</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Email</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Rol</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Fecha Registro</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600; text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 15px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div class="user-avatar" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        {{ substr($usuario->name, 0, 1) }}
                                    </div>
                                    <span style="font-weight: 500;">{{ $usuario->name }}</span>
                                </div>
                            </td>
                            <td style="padding: 15px;">{{ $usuario->email }}</td>
                            <td style="padding: 15px;">
                                <span style="background: #eef0ff; color: var(--primary-color); padding: 5px 10px; border-radius: 20px; font-size: 0.85rem;">
                                    Administrador
                                </span>
                            </td>
                            <td style="padding: 15px;">{{ $usuario->created_at->format('d/m/Y') }}</td>
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
