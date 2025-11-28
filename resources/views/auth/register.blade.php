@extends('layouts.auth')

@section('title', 'Registro - SmartVoice')
@section('header', 'Crear Cuenta')
@section('subheader', 'Regístrate para comenzar a usar SmartVoice')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name" class="form-label">Nombre Completo</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Juan Pérez">
        @error('name')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ejemplo@correo.com">
        @error('email')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
        @error('password')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
    </div>

    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
        Registrarse
    </button>

    <div class="social-login">
        <p class="social-text">¿Ya tienes una cuenta?</p>
        <a href="{{ route('login') }}" class="link">Inicia sesión aquí</a>
    </div>
</form>
@endsection
