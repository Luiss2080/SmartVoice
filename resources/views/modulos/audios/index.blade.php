@extends('layouts.app')

@section('title', 'Audios - SmartVoice')
@section('header', 'Gestión de Audios')

@push('styles')
    @vite(['resources/css/audios/index.css'])
@endpush

@section('content')
<div class="card">
    <div class="card-body" style="padding: 20px;">
        <div class="audio-card-header">
            <h3 class="card-title">Biblioteca de Audios</h3>
            <a href="{{ route('audios.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-cloud-arrow-up" style="margin-right: 8px;"></i> Subir Audio
            </a>
        </div>

        <form action="{{ route('audios.index') }}" method="GET" class="audio-filters">
            <input type="text" name="search" class="search-input" placeholder="Buscar por nombre..." value="{{ request('search') }}">
            
            <select name="campana_id" class="filter-select" onchange="this.form.submit()">
                <option value="">Todas las Campañas</option>
                @foreach($campanas as $campana)
                    <option value="{{ $campana->id }}" {{ request('campana_id') == $campana->id ? 'selected' : '' }}>
                        {{ $campana->nombre }}
                    </option>
                @endforeach
            </select>
            
            @if(request('search') || request('campana_id'))
                <a href="{{ route('audios.index') }}" class="btn btn-secondary" style="padding: 10px 15px;">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            @endif
        </form>

        @if(session('success'))
            <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="audio-table-container">
            <table class="audio-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Campaña</th>
                        <th>Duración</th>
                        <th>Tamaño</th>
                        <th>Formato</th>
                        <th style="text-align: right;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($audios as $audio)
                    <tr>
                        <td>
                            <div class="audio-name-wrapper">
                                <div class="audio-icon-small">
                                    <i class="fa-solid fa-music"></i>
                                </div>
                                <div>
                                    <div class="audio-name">{{ $audio->nombre }}</div>
                                    <div class="audio-meta">{{ $audio->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="campaign-badge">
                                {{ $audio->campana->nombre }}
                            </span>
                        </td>
                        <td>
                            <div class="mini-player">
                                <button class="play-btn" onclick="playAudio(this, '{{ asset('storage/' . $audio->archivo_path) }}')">
                                    <i class="fa-solid fa-play"></i>
                                </button>
                                <span class="audio-duration" data-id="{{ $audio->id }}" data-src="{{ asset('storage/' . $audio->archivo_path) }}" style="font-size: 0.85rem; font-family: monospace;">{{ $audio->duracion ?: '00:00' }}</span>
                            </div>
                        </td>
                        <td style="font-size: 0.9rem; color: #666;">{{ $audio->tamano }}</td>
                        <td style="text-transform: uppercase; font-size: 0.8rem; font-weight: 600; color: #888;">{{ $audio->formato }}</td>
                        <td>
                            <div class="audio-actions">
                                <a href="{{ route('audios.edit', $audio->id) }}" class="btn-action" title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <form action="{{ route('audios.destroy', $audio->id) }}" method="POST" class="delete-form" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-action delete" title="Eliminar" onclick="confirmDelete(this)">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">
                                <i class="fa-solid fa-music empty-icon"></i>
                                <p>No se encontraron audios.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div style="margin-top: 20px;">
            {{ $audios->links() }}
        </div>
    </div>
</div>

<script>
    function confirmDelete(btn) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                btn.closest('form').submit();
            }
        })
    }

    let currentAudio = null;
    let currentBtn = null;

    function playAudio(btn, src) {
        if (currentAudio && currentAudio.src === src) {
            if (currentAudio.paused) {
                currentAudio.play();
                btn.innerHTML = '<i class="fa-solid fa-pause"></i>';
            } else {
                currentAudio.pause();
                btn.innerHTML = '<i class="fa-solid fa-play"></i>';
            }
        } else {
            if (currentAudio) {
                currentAudio.pause();
                if (currentBtn) currentBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
            }
            
            currentAudio = new Audio(src);
            currentBtn = btn;
            
            currentAudio.play();
            btn.innerHTML = '<i class="fa-solid fa-pause"></i>';
            
            currentAudio.onended = function() {
                btn.innerHTML = '<i class="fa-solid fa-play"></i>';
            };
        }
    }

    // Auto-calculate duration for audios with 00:00
    document.addEventListener('DOMContentLoaded', function() {
        const durationSpans = document.querySelectorAll('.audio-duration');
        
        durationSpans.forEach(span => {
            if (span.textContent.trim() === '00:00' || span.textContent.trim() === '--:--') {
                const audioId = span.dataset.id;
                const audioSrc = span.dataset.src;
                
                if (audioSrc) {
                    const tempAudio = new Audio(audioSrc);
                    tempAudio.addEventListener('loadedmetadata', function() {
                        const duration = tempAudio.duration;
                        if (duration === Infinity || isNaN(duration)) return;
                        
                        const minutes = Math.floor(duration / 60);
                        const seconds = Math.floor(duration % 60);
                        const formattedDuration = 
                            (minutes < 10 ? '0' : '') + minutes + ':' + 
                            (seconds < 10 ? '0' : '') + seconds;
                        
                        span.textContent = formattedDuration;
                        
                        // Update in database
                        if (audioId) {
                            fetch(`/audios/${audioId}/duration`, {
                                method: 'PATCH',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ duration: formattedDuration })
                            }).catch(err => console.error('Error updating duration:', err));
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
