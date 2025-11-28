@extends('layouts.auth')

@section('title', 'Dashboard - SmartVoice')
@section('header', 'Dashboard')
@section('subheader', 'Has iniciado sesión correctamente.')

@section('content')
<div class="alert alert-success" role="alert" style="background: rgba(93, 95, 239, 0.1); color: var(--primary-dark); padding: 15px; border-radius: 12px; margin-bottom: 20px;">
    {{ __('You are logged in!') }}
</div>

<div style="text-align: center; margin-top: 20px;">
    <p>Bienvenido al sistema SmartVoice.</p>
</div>
@endsection
