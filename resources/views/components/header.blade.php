<header class="header">
    <h1 class="page-title animate-fade-in">{{ $title ?? 'Dashboard' }}</h1>
    
    <div class="header-actions animate-fade-in delay-100">
        <div class="search-bar">
            <i class="fa-solid fa-magnifying-glass" style="color: var(--primary-color);"></i>
            <input type="text" class="search-input" placeholder="Buscar en SmartVoice...">
        </div>
        
        <a href="{{ route('profile.show') }}" class="user-profile" style="text-decoration: none; color: inherit;">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name ?? 'Usuario' }}</div>
                <div class="user-role">Administrador</div>
            </div>
            <div class="user-avatar" style="overflow: hidden; display: flex; align-items: center; justify-content: center; transition: transform 0.3s ease;">
                @if(Auth::user()->profile_photo_path)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
                @endif
            </div>
        </a>
    </div>
</header>
