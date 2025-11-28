@extends('layouts.auth')

@section('title', 'Restablecer Contraseña - SmartVoice')
@section('header', 'Restablecer Contraseña')
@section('subheader', 'Crea una nueva contraseña para tu cuenta.')

@section('content')
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="ejemplo@correo.com">
        @error('email')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Nueva Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
        @error('password')
            <span class="invalid-feedback" role="alert" style="color: var(--accent-color); font-size: 0.8rem; margin-top: 5px; display: block;">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm" class="form-label">Confirmar Nueva Contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
    </div>

    <button type="submit" class="btn btn-primary">
        Restablecer Contraseña
    </button>
</form>
@endsection
