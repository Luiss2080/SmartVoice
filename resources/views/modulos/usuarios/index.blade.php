@extends('layouts.app')

@section('title', 'Usuarios - SmartVoice')
@section('header', 'Gestión de Usuarios')

@push('styles')
    @vite(['resources/css/usuarios/index.css'])
@endpush

@section('content')
<div class="card">
    <div class="card-header user-card-header">
        <h3 class="card-title">Usuarios del Sistema</h3>
        <button class="btn btn-primary" style="width: auto;">
            <i class="fa-solid fa-user-plus"></i> Nuevo Usuario
        </button>
    </div>
    <div class="card-body">
        @if($usuarios->isEmpty())
            <div class="user-empty-state">
                <i class="fa-solid fa-users user-empty-icon"></i>
                <p>No hay usuarios registrados.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha Registro</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        {{ substr($usuario->name, 0, 1) }}
                                    </div>
                                    <span class="user-name">{{ $usuario->name }}</span>
                                </div>
                            </td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <span class="role-badge">
                                    Administrador
                                </span>
                            </td>
                            <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td style="text-align: right;">
                                <button class="action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="action-btn delete">
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
