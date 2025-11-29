@push('styles')
    @vite(['resources/css/reproductor/controles.css'])
@endpush

<!-- Bottom Player Controls -->
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
