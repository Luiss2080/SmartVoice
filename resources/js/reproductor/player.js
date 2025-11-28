class SmartPlayer {
    constructor() {
        this.audio = new Audio();
        this.playlist = [];
        this.currentIndex = -1;
        this.isPlaying = false;
        this.isShuffle = false;
        this.isRepeat = false;

        this.initElements();
        this.initListeners();
    }

    initElements() {
        // Display Elements
        this.trackName = document.getElementById("track-name");
        this.trackArtist = document.getElementById("track-artist");
        this.currentTimeEl = document.getElementById("current-time");
        this.totalTimeEl = document.getElementById("total-time");
        this.progressBar = document.getElementById("progress-fill");
        this.progressWrapper = document.getElementById("progress-bar-wrapper");
        this.playlistContainer = document.getElementById("playlist-content");

        // Controls
        this.playBtn = document.getElementById("play-btn");
        this.prevBtn = document.getElementById("prev-btn");
        this.nextBtn = document.getElementById("next-btn");
        this.volumeSlider = document.getElementById("volume-slider");
        this.volumeIcon = document.getElementById("volume-icon");
    }

    initListeners() {
        // Audio Events
        this.audio.addEventListener("timeupdate", () => this.updateProgress());
        this.audio.addEventListener("ended", () => this.playNext());
        this.audio.addEventListener("loadedmetadata", () => {
            this.totalTimeEl.textContent = this.formatTime(this.audio.duration);
        });

        // Control Events
        this.playBtn.addEventListener("click", () => this.togglePlay());
        this.prevBtn.addEventListener("click", () => this.playPrev());
        this.nextBtn.addEventListener("click", () => this.playNext());

        // Progress Bar Click
        this.progressWrapper.addEventListener("click", (e) => {
            const width = this.progressWrapper.clientWidth;
            const clickX = e.offsetX;
            const duration = this.audio.duration;
            this.audio.currentTime = (clickX / width) * duration;
        });

        // Volume
        this.volumeSlider.addEventListener("input", (e) => {
            this.audio.volume = e.target.value / 100;
            this.updateVolumeIcon(e.target.value);
        });
    }

    async loadCampaign(campanaId, campanaName) {
        try {
            document.getElementById("current-campaign-title").textContent =
                campanaName;
            this.playlistContainer.innerHTML =
                '<div style="padding: 20px; text-align: center; color: #888;">Cargando audios...</div>';

            const response = await fetch(`/reproductor/audios/${campanaId}`);
            const audios = await response.json();

            this.playlist = audios;
            this.renderPlaylist();

            // Highlight active campaign in sidebar
            document
                .querySelectorAll(".campaign-item")
                .forEach((item) => item.classList.remove("active"));
            document
                .querySelector(`[data-id="${campanaId}"]`)
                .classList.add("active");
        } catch (error) {
            console.error("Error loading campaign:", error);
            this.playlistContainer.innerHTML =
                '<div style="padding: 20px; text-align: center; color: red;">Error al cargar audios</div>';
        }
    }

    renderPlaylist() {
        this.playlistContainer.innerHTML = "";
        const ul = document.createElement("ul");
        ul.className = "audio-list";

        if (this.playlist.length === 0) {
            this.playlistContainer.innerHTML =
                '<div style="padding: 40px; text-align: center; color: #888;">No hay audios en esta campaña</div>';
            return;
        }

        this.playlist.forEach((track, index) => {
            const li = document.createElement("li");
            li.className = `audio-item ${
                index === this.currentIndex ? "playing" : ""
            }`;
            li.onclick = () => this.playTrack(index);

            li.innerHTML = `
                <div class="audio-wave">
                    <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
                </div>
                <div class="audio-index">${index + 1}</div>
                <div class="audio-info">
                    <div class="audio-title">${track.title}</div>
                </div>
                <div class="audio-duration">${track.duration || "--:--"}</div>
            `;
            ul.appendChild(li);
        });

        this.playlistContainer.appendChild(ul);
    }

    playTrack(index) {
        if (index >= 0 && index < this.playlist.length) {
            this.currentIndex = index;
            const track = this.playlist[index];

            this.audio.src = track.src;
            this.audio.play();
            this.isPlaying = true;

            this.updateDisplay(track);
            this.updatePlayBtn();
            this.renderPlaylist(); // Re-render to show active state
        }
    }

    togglePlay() {
        if (this.playlist.length === 0) return;

        if (this.audio.paused) {
            if (this.currentIndex === -1) this.playTrack(0);
            else this.audio.play();
            this.isPlaying = true;
        } else {
            this.audio.pause();
            this.isPlaying = false;
        }
        this.updatePlayBtn();
    }

    playNext() {
        let nextIndex = this.currentIndex + 1;
        if (nextIndex >= this.playlist.length) {
            nextIndex = 0; // Loop back to start
        }
        this.playTrack(nextIndex);
    }

    playPrev() {
        let prevIndex = this.currentIndex - 1;
        if (prevIndex < 0) {
            prevIndex = this.playlist.length - 1;
        }
        this.playTrack(prevIndex);
    }

    updateDisplay(track) {
        this.trackName.textContent = track.title;
        this.trackArtist.textContent = document.getElementById(
            "current-campaign-title"
        ).textContent;
    }

    updatePlayBtn() {
        this.playBtn.innerHTML = this.isPlaying
            ? '<i class="fa-solid fa-pause"></i>'
            : '<i class="fa-solid fa-play"></i>';
    }

    updateProgress() {
        const { currentTime, duration } = this.audio;
        const progressPercent = (currentTime / duration) * 100;
        this.progressBar.style.width = `${progressPercent}%`;
        this.currentTimeEl.textContent = this.formatTime(currentTime);
    }

    updateVolumeIcon(value) {
        if (value == 0) this.volumeIcon.className = "fa-solid fa-volume-xmark";
        else if (value < 50)
            this.volumeIcon.className = "fa-solid fa-volume-low";
        else this.volumeIcon.className = "fa-solid fa-volume-high";
    }

    formatTime(seconds) {
        if (isNaN(seconds)) return "00:00";
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins < 10 ? "0" : ""}${mins}:${secs < 10 ? "0" : ""}${secs}`;
    }
}

// Initialize Player
const player = new SmartPlayer();

// Global function for sidebar clicks
window.loadCampaign = (id, name) => player.loadCampaign(id, name);
