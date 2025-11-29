@extends('layouts.app')

@section('title', 'Configuración - SmartVoice')
@section('header', 'Configuración del Sistema')

@push('styles')
    @vite(['resources/css/configuracion/general.css', 'resources/css/configuracion/usuarios.css'])
@endpush

@section('content')
<div class="card config-card">
    <div class="card-body" style="padding: 0;">
        <div class="config-layout">
            <!-- Sidebar Navigation -->
            <div class="config-sidebar">
                <div class="config-nav-title">Ajustes</div>
                <ul class="config-nav">
                    <li>
                        <a href="{{ route('configuracion.index') }}" class="config-nav-link {{ request()->routeIs('configuracion.index') ? 'active' : '' }}">
                            <i class="fa-solid fa-sliders"></i> General
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('configuracion.index') }}#reproduccion" class="config-nav-link">
                            <i class="fa-solid fa-music"></i> Reproducción
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('usuarios.index') }}" class="config-nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                            <i class="fa-solid fa-users"></i> Usuarios
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Content Area -->
            <div class="config-content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('config-content')
            </div>
        </div>
    </div>
</div>
@endsection
