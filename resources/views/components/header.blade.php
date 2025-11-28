<header class="header">
    <h1 class="page-title">@yield('header', 'Dashboard')</h1>
    
    <div class="header-actions">
        <div class="search-bar">
            <i class="fa-solid fa-magnifying-glass" style="color: var(--text-light);"></i>
            <input type="text" class="search-input" placeholder="Buscar...">
        </div>
        
        <div class="user-profile">
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name ?? 'Usuario' }}</div>
                <div class="user-role">Administrador</div>
            </div>
            <div class="user-avatar">
                {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
        </div>
    </div>
</header>
