@extends('layouts.auth')

@section('title', 'Confirmar Contraseña - SmartVoice')
@section('header', 'Confirmar Acceso')
@section('subheader', 'Por favor confirma tu contraseña antes de continuar.')

@section('content')
<form method="POST" action="{{ route('password.confirm') }}">
    @csrf

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
        @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">
                ¿Olvidaste tu contraseña?
            </a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">
        Confirmar Contraseña
    </button>
</form>
@endsection
