@extends('layouts.app')

@section('title', 'Reproductor - SmartVoice')
@section('header', 'Reproductor')

@push('styles')
    @vite(['resources/css/reproductor/index.css'])
@endpush

@section('content')
<div class="player-container">
    <!-- Sidebar: Campaigns -->
    <div class="player-sidebar">
        <div class="sidebar-header">
            <h3 class="sidebar-title">Campañas</h3>
        </div>
        <div class="campaign-list">
            @forelse($campanas as $campana)
                <div class="campaign-item" onclick="loadCampaign({{ $campana->id }}, '{{ $campana->nombre }}')" data-id="{{ $campana->id }}">
                    <span class="campaign-name">{{ $campana->nombre }}</span>
                    <span class="campaign-meta">{{ $campana->audios_count }} audios</span>
                </div>
            @empty
                <div style="padding: 20px; text-align: center; color: #888;">
                    No hay campañas activas.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Main: Playlist -->
    <div class="player-main">
        <div class="playlist-header">
            <h2 class="current-campaign-title" id="current-campaign-title">Selecciona una campaña</h2>
            <div class="playlist-actions">
                <!-- Future: Search or Filter -->
            </div>
        </div>
        
        <div class="playlist-content" id="playlist-content">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; color: #ccc;">
                <i class="fa-solid fa-music" style="font-size: 3rem; margin-bottom: 20px;"></i>
                <p>Selecciona una campaña para ver sus audios</p>
            </div>
        </div>

        <!-- Bottom Controls -->
        <div class="player-controls-bar">
            <!-- Now Playing -->
            <div class="now-playing-info">
                <div class="album-art-placeholder">
                    <i class="fa-solid fa-music"></i>
                </div>
                <div class="track-details">
                    <div class="track-name" id="track-name">No Audio Selected</div>
                    <div class="track-artist" id="track-artist">--</div>
                </div>
            </div>

            <!-- Main Controls -->
            <div class="main-controls">
                <div class="control-buttons">
                    <button class="btn-control" title="Aleatorio"><i class="fa-solid fa-shuffle"></i></button>
                    <button class="btn-control" id="prev-btn"><i class="fa-solid fa-backward-step"></i></button>
                    <button class="btn-play" id="play-btn"><i class="fa-solid fa-play"></i></button>
                    <button class="btn-control" id="next-btn"><i class="fa-solid fa-forward-step"></i></button>
                    <button class="btn-control" title="Repetir"><i class="fa-solid fa-repeat"></i></button>
                </div>
                <div class="progress-area">
                    <span id="current-time">00:00</span>
                    <div class="progress-bar-wrapper" id="progress-bar-wrapper">
                        <div class="progress-fill" id="progress-fill">
                            <div class="progress-handle"></div>
                        </div>
                    </div>
                    <span id="total-time">00:00</span>
                </div>
            </div>

            <!-- Volume -->
            <div class="volume-controls">
                <i class="fa-solid fa-volume-high" id="volume-icon" style="color: #666; width: 20px;"></i>
                <input type="range" class="volume-slider" id="volume-slider" min="0" max="100" value="80">
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite(['resources/js/reproductor/player.js'])
@endpush
@endsection
