@extends('layouts.auth')

@section('title', 'Recuperar Contraseña - SmartVoice')
@section('header', 'Recuperar Contraseña')
@section('subheader', 'Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert" style="background: rgba(93, 95, 239, 0.1); color: var(--primary-dark); padding: 15px; border-radius: 12px; margin-bottom: 20px; font-size: 0.9rem;">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
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

    <button type="submit" class="btn btn-primary">
        Enviar Enlace de Recuperación
    </button>

    <div class="social-login">
        <a href="{{ route('login') }}" class="link">Volver al inicio de sesión</a>
    </div>
</form>
@endsection
