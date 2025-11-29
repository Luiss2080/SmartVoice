@extends('layouts.app')

@section('title', 'Mi Perfil - SmartVoice')
@section('header', 'Mi Perfil')

@push('styles')
    @vite(['resources/css/perfil/show.css'])
@endpush

@section('content')
<div class="card profile-view-card">
    <div class="card-body" style="padding: 50px;">
        <div class="profile-view-header">
            @if($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile" class="profile-view-avatar">
            @else
                <div class="profile-view-placeholder">
                    {{ substr($user->name, 0, 1) }}
                </div>
            @endif
            
            <h2 class="profile-view-name">{{ $user->name }}</h2>
            <div class="profile-view-role">Administrador</div>
        </div>

        <div class="profile-details">
            <div class="detail-item">
                <div class="detail-label">Correo Electrónico</div>
                <div class="detail-value">{{ $user->email }}</div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Miembro Desde</div>
                <div class="detail-value">{{ $user->created_at->format('d M, Y') }}</div>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary" style="padding: 12px 30px;">
                <i class="fa-solid fa-pen-to-square" style="margin-right: 8px;"></i> Editar Perfil
            </a>
        </div>
    </div>
</div>
@endsection
