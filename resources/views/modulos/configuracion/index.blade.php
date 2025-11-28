@extends('layouts.app')

@section('title', 'Configuración - SmartVoice')
@section('header', 'Configuración del Sistema')

@section('content')
<div class="dashboard-grid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Perfil</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" value="{{ Auth::user()->email }}">
                </div>
                <button class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Seguridad</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="form-label">Contraseña Actual</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control">
                </div>
                <button class="btn btn-primary">Actualizar Contraseña</button>
            </form>
        </div>
    </div>
</div>
