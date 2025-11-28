@extends('layouts.app')

@section('title', 'Usuarios - SmartVoice')
@section('header', 'Gestión de Usuarios')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuarios del Sistema</h3>
        <button class="btn btn-primary" style="width: auto;">Nuevo Usuario</button>
    </div>
    <div class="card-body">
        <p style="color: var(--text-light);">Administra los usuarios y sus permisos.</p>
        <!-- Placeholder for table -->
        <div style="margin-top: 20px; padding: 20px; background: #f8f9fa; border-radius: 12px; text-align: center; color: var(--text-light);">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px; padding: 10px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <div class="user-avatar" style="width: 40px; height: 40px;">L</div>
                <div style="text-align: left;">
                    <div style="font-weight: 600;">Luis Rocha</div>
                    <div style="font-size: 0.8rem; color: var(--text-light);">LuisRocha@gmail.com</div>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 15px; padding: 10px; background: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <div class="user-avatar" style="width: 40px; height: 40px; background: #FFD166; color: #333;">A</div>
                <div style="text-align: left;">
                    <div style="font-weight: 600;">Arely Nuñez</div>
                    <div style="font-size: 0.8rem; color: var(--text-light);">ArelyNuñez@gmail.com</div>
                </div>
            </div>
        </div>
    </div>
</div>
