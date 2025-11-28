@extends('layouts.auth')

@section('title', 'Iniciar Sesión - SmartVoice')
@section('header', 'Bienvenido de nuevo')
@section('subheader', 'Ingresa tus credenciales para acceder a tu cuenta')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ejemplo@correo.com">
        @error('email')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
        @error('password')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="auth-links">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember" style="color: var(--text-light);">
                Recordarme
            </label>
        </div>
        
        @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        Iniciar Sesión
    </button>

    <div class="social-login">
        <p class="social-text">¿No tienes una cuenta?</p>
        <a href="{{ route('register') }}" class="link">Regístrate aquí</a>
    </div>
</form>
@endsection
