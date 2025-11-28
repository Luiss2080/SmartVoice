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

    <!-- Controls Placeholder (Rendered via controles.blade.php) -->
    @include('modulos.reproductor.controles')
</div>
