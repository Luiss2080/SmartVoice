@extends('layouts.app')

@section('title', 'Mi Perfil - SmartVoice')
@section('header', 'Mi Perfil')
@extends('layouts.app')

@section('title', 'Mi Perfil - SmartVoice')
@section('header', 'Mi Perfil')

@push('styles')
    @vite(['resources/css/perfil/edit.css'])
@endpush

@section('content')
<div class="profile-edit-container animate-fade-in">
    <div class="profile-edit-card">
        @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 12px; margin-bottom: 30px; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="profile-edit-header">
                <div class="profile-avatar-upload">
                    @if($user->profile_photo_path)
                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile" class="avatar-preview" id="avatar-preview">
                    @else
                        <div class="avatar-placeholder" id="avatar-placeholder">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <img src="" alt="Profile" class="avatar-preview" id="avatar-preview" style="display: none;">
                    @endif
                    
                    <label for="photo" class="upload-btn" title="Cambiar foto">
                        <i class="fa-solid fa-camera"></i>
                    </label>
                    <input type="file" name="photo" id="photo" accept="image/*" style="display: none;">
                </div>
                <h2 style="font-size: 1.5rem; margin-bottom: 5px;">Editar Perfil</h2>
                <p style="color: var(--text-light);">Actualiza tu información personal</p>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label class="form-label">Nombre Completo</label>
                    <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" class="form-input" placeholder="Dejar vacío para mantener">
                </div>

                <div class="form-group">
                    <label class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="Confirmar nueva contraseña">
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('profile.show') }}" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save" style="margin-right: 8px;"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    @vite(['resources/js/perfil/edit.js'])
@endpush
