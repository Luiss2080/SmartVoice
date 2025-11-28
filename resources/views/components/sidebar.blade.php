<aside class="sidebar">
    <div class="sidebar-brand">
        <i class="fa-solid fa-layer-group"></i>
        <span>SmartVoice</span>
    </div>
    
    <ul class="nav-list">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="fa-solid fa-grid-2 nav-icon"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-bullhorn nav-icon"></i>
                <span>Campañas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-microphone-lines nav-icon"></i>
                <span>Audios</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-clock-rotate-left nav-icon"></i>
                <span>Historial</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users nav-icon"></i>
                <span>Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
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
