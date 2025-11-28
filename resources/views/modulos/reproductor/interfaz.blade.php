@extends('layouts.app')

@section('title', 'Reproductor - SmartVoice')
@section('header', 'Reproductor')

@push('styles')
    @vite(['resources/css/reproductor/index.css'])
@endpush

@section('content')
<div class="player-container">
    @include('modulos.reproductor.lista')
</div>

@push('scripts')
    @vite(['resources/js/reproductor/player.js'])
@endpush
@endsection
