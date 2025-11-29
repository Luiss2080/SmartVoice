<aside class="sidebar animate-slide-in">
    <div class="sidebar-brand">
        <img src="{{ asset('img/logo.png') }}" alt="SmartVoice Logo">
        <span class="brand-text">SmartVoice</span>
    </div>
    
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house nav-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('campanas.index') }}" class="nav-link {{ request()->routeIs('campanas.*') ? 'active' : '' }}">
                <i class="fa-solid fa-bullhorn nav-icon"></i>
                <span>Campañas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('audios.index') }}" class="nav-link {{ request()->routeIs('audios.*') ? 'active' : '' }}">
                <i class="fa-solid fa-microphone-lines nav-icon"></i>
                <span>Audios</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('historial.index') }}" class="nav-link {{ request()->routeIs('historial.*') ? 'active' : '' }}">
                <i class="fa-solid fa-clock-rotate-left nav-icon"></i>
                <span>Historial</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('usuarios.index') }}" class="nav-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">
                <i class="fa-solid fa-users nav-icon"></i>
                <span>Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('calendario.index') }}" class="nav-link {{ request()->routeIs('calendario.*') ? 'active' : '' }}">
                <i class="fa-solid fa-calendar-days nav-icon"></i>
                <span>Calendario</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('configuracion.index') }}" class="nav-link {{ request()->routeIs('configuracion.*') ? 'active' : '' }}">
                <i class="fa-solid fa-gear nav-icon"></i>
                <span>Configuración</span>
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer" style="margin-top: auto;">
        <a href="{{ route('logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           class="nav-link" style="color: rgba(255,255,255,0.8);">
            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
            <span>Cerrar Sesión</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
